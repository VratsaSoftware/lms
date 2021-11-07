# lms
Learning Management Platform

[Documentation](https://docs.google.com/document/d/1wJdTSMFZ9RzWA9ArbX7PnM6hAfP4fEDLjto9Y5DQ3Tk/edit?usp=sharing)

Roles:
- Admin
- Lecturer
- User - student

### Admin
Manages the system (creates, edits and performs all possible operations)
- courses
- tests
- polls
- events

### Lecturer
Manages the courses in which it is added by the admin (Can perform all operations)

### Student
- You can apply for open courses through your account
- There is access to the modules and lectures of the courses in which it is added
- Can solve tests in which it is added
- Can respond to polls
- Can view events
<hr>

## Setup instructions
- Clone the repository with `git clone`
- Copy `.env.example` file to `.env` and edit database credentials there
- Run `composer install`
- Run `php artisan key:generate`
- Run `php artisan migrate --seed` (it has some seeded data - see below)
- Run (Start project) `php artisan serve`
- That's it: launch the main URL and login with default credentials `admin@vsc.com` - `123321` |  `lecturer1@test.test` - `123456789` | `test1@test.test` - `123456789`

## .env settings
#### Connecting lms to the public site
- Add/Changes to `.env` - `PUBLIC_PLATFORM_URL="https://example.com"`

#### Hide application form
- Add/Changes to .env `.env` - `HIDE_APPLICATION_FORM=true`

#### Hide debugbar
- Add/Changes to .env `.env` - `DEBUGBAR_ENABLED=false`
