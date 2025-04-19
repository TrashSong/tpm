
## Setup Instructions

composer install
npm install
npm install tailwindcss @tailwindcss/vite
php artisan key:generate
php artisan migrate --seed

npm run build 
or 
npm run dev

php artisan serve and visit http://127.0.0.1:8000
or
visit http://tpm.test (declared in .env) using herd(or similar)

## Design

Users are able to view projects from the projects page.
They can view any project, but must be authorized to edit them, as well as view and edit tasks.
Tasks can be seen and accessed from specific project page.
On tasks page users can view info about task and edit it.
Currently no functionality for adding users to project.

## Relationships:

Several users can work on one project, each user can have many projects (many-to-many)

Task assigned to one user in one project, user can have multiple tasks, as well as project (many-to-one)
