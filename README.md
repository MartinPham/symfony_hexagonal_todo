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
    │           ├── Resources
    │           │   ├── config
    │           │   │   └── services.yml
    │           │   └── views
    │           │       └── Default
    │           │           └── index.html.twig
    │           ├── Tests
    │           │   └── Controller
    │           │       └── DefaultControllerTest.php
    │           └── TodoBundle.php
    └── Persistence
        └── File
            └── Task
                ├── TaskRepository.php
                └── tasks.txt
```