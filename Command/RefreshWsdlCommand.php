<?php
namespace Ddeboer\Salesforce\MapperBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\ArrayInput;
use Guzzle\Http\Client;

/**
 * Fetch latest WSDL from Salesforce and store it locally
 *
 * @author David de Boer <david@ddeboer.nl>
 */
class RefreshWsdlCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('salesforce:refresh-wsdl')
            ->setDescription('Refresh Salesforce WSDL')
            ->setHelp(
                'Refreshing the WSDL itself requires a WSDL, so when using this'
                . 'command for the first time, please download the WSDL '
                . 'manually from Salesforce'
            )
            ->addOption(
                'no-cache-clear',
                'c',
                InputOption::VALUE_NONE,
                'Do not clear cache after refreshing WSDL'
            );
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Updating the WSDL file');

        $client = $this->getContainer()->get('ddeboer_salesforce_client');

        // Get current session id
        $loginResult = $client->getLoginResult();
        $sessionId = $loginResult->sessionId;

        // Get current server instance (Salesforce subdomain)
        $match = preg_match(
            '/https:\/\/(?<instance>[^-\.]+)/',
            $loginResult->serverUrl,
            $matches
        );
        if (!$match || !isset($matches['instance'])) {
            throw new \RuntimeException('Server instance could not be determined');
        }

        $url = sprintf('https://%s.salesforce.com', $matches['instance']);
        $guzzle = new Client(
            $url,
            array(
                'curl.CURLOPT_SSL_VERIFYHOST' => false,
                'curl.CURLOPT_SSL_VERIFYPEER' => false,
            )
        );

        // type=* for enterprise WSDL
        $request = $guzzle->get('/soap/wsdl.jsp?type=*');
        $request->addCookie('sid', $sessionId);
        $response = $request->send();

        $wsdl = $response->getBody();
        $wsdlFile = $this->getContainer()
            ->getParameter('ddeboer_salesforce_client.wsdl');

        // Write WSDL
        file_put_contents($wsdlFile, $wsdl);

        // Run clear cache command
        if (!$input->getOption('no-cache-clear')) {
            $command = $this->getApplication()->find('cache:clear');

            $arguments = array(
                'command' => 'cache:clear'
            );
            $input = new ArrayInput($arguments);
            $command->run($input, $output);
        }
    }
}

