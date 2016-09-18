<?php
namespace App\Testing;

use App\Articles\Article;
use App\Contacts\Contact;
use App\Riders\Rider;
use App\Rosters\Roster;
use App\Users\User;
use Carbon\Carbon;

trait CreatesModels
{
    /**
     * @param array $attributes
     * @return \App\Users\User
     */
    public function createUser(array $attributes = [])
    {
        return $this->modelFactory->create(User::class, array_merge([
            'email' => 'foo@bar.com',
            'username' => 'johndoe',
            'first_name' => 'John',
            'last_name' => 'Doe',
            'password' => 'password',
            'password_temp' => '',
            'code' => '',
            'active' => true,
            'level_id' => User::USER,
            'remember_token' => 'fvbhdfbvhjdfbv',
        ], $attributes));
    }

    /**
     * @param array $attributes
     * @return \App\Rosters\Roster
     */
    public function createRoster(array $attributes = [])
    {
        return $this->modelFactory->create(Roster::class, array_merge([
            'name' => 3,
            'date' => Carbon::now(),
            'type' => Roster::DRESSUURLES,
            'description' => 'Foo bar',
            'limit' => 12,
            'hour' => 1,
        ], $attributes));
    }

    /**
     * @param array $attributes
     * @return \App\Riders\Rider
     */
    public function createRider(array $attributes = [])
    {
        return $this->modelFactory->create(Rider::class, array_merge([
            'firstname' => 'Foo',
            'lastname' => 'bar',
        ], $attributes));
    }

    /**
     * @param array $attributes
     * @return \App\Contacts\Contact
     */
    public function createFormEntry(array $attributes = [])
    {
        return $this->modelFactory->create(Contact::class, array_merge([
            'full_name' => 'John Doe',
            'email' => 'john@doe.com',
            'subject' => 'Foo',
            'message' => 'bar',
            'read' => false,
        ], $attributes));
    }

    /**
     * @param array $attributes
     * @return \App\Articles\Article
     */
    public function createArticle(array $attributes = [])
    {
        return $this->modelFactory->create(Article::class, array_merge([
            'title' => 'Foo Title',
            'message' => 'Foo Message',
        ], $attributes));
    }

    /**
     * @param array $attributes
     * @return \App\Users\User
     */
    public function loginAsUser(array $attributes = [])
    {
        $user = $this->createUser($attributes);
        $this->be($user);
        
        return $user;
    }
}
