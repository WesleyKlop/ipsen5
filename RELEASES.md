# Version 0.2.1 (07-06-2019)

## Bugfixes
* Fixed entire application not working when not signed in (#96)
* Remove an unused dependency (#99)
* Fixed results page sometimes not working (#100)
* Run prettier again (#101)

# Version 0.2 (06-06-2019)

## General
- Added automated updates for dependencies trough `Dependabot`.<br>
This bot will update the dependencies of both the back- and frontend once a week.

## Backend
- Added Trial
- WIP mailing
    - Mail can be sent, except little work has been done to the layout of the mail being send.

- Migrations
    - Added a few migrations

## Frontend
- Added admin-panel
- Added result page for voter
- Added mail page
- WIP result page for candidate

# Version 0.1 (23-05-2019)

## General
   - Setup project
   - Add CI trough Travis
   
## Backend:
- Added the following models:
   - Admin
   - Answer
   - AnswerProposition
   - AppUser
   - Candidate
   - Profile
   - Proposition
   - Survey
   - SurveyCode
   - User
   - Voter
   
- Implemented the following routes:
   - GET /candidate/{candidateId}
   - POST /voter/login
   - GET /me
   - GET /survey
   - GET /survey/proposition
   - POST /answer
   - GET /answer

- Migrations
   - Added a bunch of db migrations
   
## Frontend
- Implemented the following pages:
   - General:
      - 404 page
   - Voter
      - Login page
      - Info page
      - Proposition(s) page
   - Candidate
      - Login page
      - Proposition(s) page
      - Info page 
   - Admin
      - Login page
