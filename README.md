---
name: Feature request
Composer: composer require nasirgolflan/database
title: ''
Current version: 'v1.3'
assignees: ''

---


**Auto Config default values.**

         hostname=> 'localhost'  
         username => 'root'
         password=> ''
         database => 'default'
         dbprefix => ''

For change pass your own config variable

**INIT INSTALL IN YOUR CODE**

        use \Nasirgolflan\Database\Mysqli;
        
         $obj= new Mysqli([database'=>'tmp']);    

**INSERT OPERATON**

        // $obj->insert('TABLE_NAME',[Column=>value ..... ]); 
        $obj->insert('city',['name'=>'rajsthan','state_id'=>1]); 
        
**Update Operation**
        
        //$obj->update('TABLE_NAME','CONDITION',['COLUMN'=>'VALUE', ....]);
        
        EXAMPLE
        
        $obj->update('city','id=7',['name'=>'Noida']);
        
**DELETE**
        
        //$obj->delete('TABLE_NAME',['COLUMN'=>'VALUE','COLUMN'=>VALUE],'and/or/');  //DEFAULT IS AND
        
        $obj->delete('city',['name'=>'rajsthan','state_id'=>1]);
        
        $obj->delete('city',['name'=>'rajsthan','state_id'=>1],'or');

**Describe alternatives you've considered**

        ..

**Additional context**

       
        $db= new \Nasirgolflan\Database\Mysqli(['password'=>'welcome','database'=>'tmp']);   
        $db2= new \Nasirgolflan\Database\Mysqli(['password'=>'welcome','database'=>'slim3']);

        $db->insert('tasks',['task'=>'nasir'.rand(0,999)]);

        $db2->insert('tasks',['task'=>'nasir']);
      
        $db2->insert('books',[
            'title'=>'nasir',
            'author'=>"AU-".rand(0,999),
            'category'=>'cat-'.rand(0,999),
            ]);
