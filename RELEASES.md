# Version 0.1

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
