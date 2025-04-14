# VILCOM IMS

## Overview
The VILCOM IMS is a comprehensive system designed to manage and track various assets within an organization. It provides functionalities for departments, equipment repair, network equipment, office equipment, user requests, user roles, servers, and their maintenance.

## Table of Contents
1. [Features](#features)
2. [Database Tables](#database-tables)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Contributing](#contributing)
6. [License](#license)

## Features
- **Department Management**: Manage organizational departments and their information.
- **Equipment Repair Tracking**: Track repairs and maintenance activities for equipment.
- **Network Equipment Management**: Manage network equipment details and configurations.
- **Office Equipment Tracking**: Track office equipment inventory and usage.
- **User Request Handling**: Handle user requests for equipment maintenance or repairs.
- **Role Management**: Manage user roles and permissions within the system.
- **Server Management**: Manage server details and maintenance activities.

## Database Tables
The system uses the following database tables to store information:
- **department**: Stores information about organizational departments.
- **equipment_repair**: Tracks repairs and maintenance activities for equipment.
- **network_equipment**: Stores details of network equipment.
- **network_repair**: Tracks repairs and maintenance activities for network equipment.
- **office_equipment**: Stores details of office equipment.
- **request**: Manages user requests for equipment maintenance or repairs.
- **role**: Stores user roles and permissions.
- **server**: Stores details of servers.
- **server_repair**: Tracks repairs and maintenance activities for servers.
- **user**: Stores user information.

## Installation
To install and run the VILCOM IMS, follow these steps:
1. Clone the repository: `git clone <repository_url>`
2. Install dependencies: `npm install`
3. Set up the database:
   - Create a PostgreSQL database.
   - Import the database schema from `database/schema.sql`.
4. Configure the database connection in `config/database.js`.
5. Start the application: `npm start`
6. Access the application in your web browser at `http://localhost:3000`.

## Usage
Once the application is set up, users can perform the following actions:
- Log in with their credentials.
- Navigate through the different modules to manage departments, equipment, requests, etc.
- Create, update, or delete records as needed.
- Assign roles and permissions to users.
- Track equipment repairs and maintenance activities.

## Contributing
Contributions to the VILCOM IMS are welcome! If you'd like to contribute, please follow these steps:
1. Fork the repository.
2. Create a new branch: `git checkout -b feature/new-feature`
3. Make your changes and commit them: `git commit -m 'Add new feature'`
4. Push to the branch: `git push origin feature/new-feature`
5. Submit a pull request.

## License
This project is licensed under the [Vilcom Networks](LICENSE).
