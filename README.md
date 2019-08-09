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

**Is your feature request related to a problem? Please describe.**
A clear and concise description of what the problem is. Ex. I'm always frustrated when [...]

**Describe the solution you'd like**
A clear and concise description of what you want to happen.

**Describe alternatives you've considered**
A clear and concise description of any alternative solutions or features you've considered.

**Additional context**
Add any other context or screenshots about the feature request here.
