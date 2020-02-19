<?php
require_once '../models/Post.php';

class MainController
{
    /**
     * @return string
     */
    public function main(): void
    {
        $_REQUEST['posts'] = (new Post())->all();
        require '../views/index.php';
    }

    /**
     * @return string
     */
    public function save(): void
    {
        /** Create new post in database*/
        $post = new Post();
        $post->create([
            'title' => $_POST['title'],
            'text' => $_POST['text'],
        ]);


        /** Redirect to the main page */
        header('Location: /');
    }
}