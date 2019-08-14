---
name: Feature request
Composer: composer require nasirgolflan/database
title: ''
Current version: 'v1.3'
assignees: ''

---

$db= new \Nasirgolflan\Database\Mysqli(['password'=>'welcome','database'=>'tmp']);   
        $db2= new \Nasirgolflan\Database\Mysqli(['password'=>'welcome','database'=>'slim3']);

        $db->insert('tasks',['task'=>'nasir'.rand(0,999)]);

        $db2->insert('tasks',['task'=>'nasir']);
      
        $db2->insert('books',[
            'title'=>'nasir',
            'author'=>"AU-".rand(0,999),
            'category'=>'cat-'.rand(0,999),
            ]);

**Auto Config default values.**

         hostname=> 'localhost'  
         username => 'root'
         password=> ''
         database => 'default'
         dbprefix => ''

For change pass your own config variable


**Describe the solution you'd like**

        ..

**Describe alternatives you've considered**

        ..

**Additional context**

        ..
