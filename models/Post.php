<?php
require_once 'ActiveRecord.php';

class Post extends ActiveRecord
{
    protected $tableName = 'posts';
}