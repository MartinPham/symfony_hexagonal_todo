todo
====

My very first attempt to Hexagonal architect, with Symfony 3
```
src
├── Application
│   └── Task
│       ├── CreateTask.php
│       ├── DeleteTask.php
│       └── ListTask.php
├── Domain
│   ├── Repository
│   │   ├── Exception
│   │   │   └── TaskNotFoundException.php
│   │   └── TaskRepositoryInterface.php
│   └── Task.php
└── Infrastructure
    ├── Delivery
    │   ├── Api
    │   ├── Backend
    │   ├── Cli
    │   └── Frontend
    │       └── TodoBundle
    │           ├── Controller
    │           │   └── DefaultController.php
    │           ├── DependencyInjection
    │           │   ├── Configuration.php
    │           │   └── TodoExtension.php
    │           ├── Entity
    │           │   └── TaskType.php
    │           ├── Repository
    │           ├── Resources
    │           │   ├── config
    │           │   │   └── services.yml
    │           │   └── views
    │           │       └── Default
    │           │           └── index.html.twig
    │           └── TodoBundle.php
    └── Persistence
        ├── DoctrineODM
        │   └── Task
        │       ├── Task.mongodb.yml
        │       └── TaskRepository.php
        ├── DoctrineORM
        │   └── Task
        │       ├── Task.orm.yml
        │       └── TaskRepository.php
        ├── File
        │   └── Task
        │       ├── TaskRepository.php
        │       └── tasks.txt
        └── Memory
            └── Task
                └── TaskRepository.php
```