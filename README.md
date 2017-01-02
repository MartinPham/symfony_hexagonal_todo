todo
====

My very first attempt to Hexagonal architect, with Symfony 3
```
src
├── Application
│   ├── Repository
│   │   ├── AdapterInterface.php
│   │   └── TaskRepository.php
│   └── Task
│       └── TaskService.php
├── Domain
│   ├── Repository
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
        └── Adapter
            ├── DoctrineORM
            │   ├── Adapter.php
            │   └── Task.orm.yml
            └── Memory
                └── Adapter.php

```