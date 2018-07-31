<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BlogControllerTest extends WebTestCase
{
    public function testSomething()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame(1, $crawler->filter('h1:contains("Symfony 4")')->count());
    }

public function testCheckPassword(){
        $client = static::createClient();

        $crawler = $client->request(
            'GET',
            '/register/' 
            /*
            [FR]
            C'teu piege !! sans le / de fin (de register), 
            impossible de faire fonctionner les testes, 
			j'ai bien mis 20 minutes a trouver, ça 
			Aussi avec fos_user, pour faire passer les testes
            [EN]
            So don't forget to add the / at the end of register 
            plus if you are using fos_user use F12
            and add the value you'll see in name	
            */
        );

        $form = $crawler->selectButton('Register')->form();

        $form['fos_user_registration_form[email]'] = 'toto@email.com';
        $form['fos_user_registration_form[username]'] = 'usernametest';
       
        $form['fos_user_registration_form[plainPassword][first]'] = 'pass1';
        $form['fos_user_registration_form[plainPassword][second]'] = 'pass2';

        $crawler = $client->submit($form);

        //echo $client->getResponse()->getContent();

        //var_dump($client->getResponse()->getContent());

        $this->assertEquals(1,
            $crawler->filter('li:contains("The entered passwords don\'t match.")')->count()
            // add your message
        );
    }
}