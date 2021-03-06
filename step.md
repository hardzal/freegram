## ⭐️Course Contents ⭐️
    - Freecodecamp: https://www.youtube.com/watch?v=ImtZ5yENzgE&t=44s
  
- [x] (0:00) Introduction
- [x] (1:14) What is Laravel?
- [x] (2:07) Installing Laravel
- [x] (5:30) First look at the project
- [x] (7:15) Intro to php artisan
- [x] (11:42) Generating login flow with make:auth
- [x] (12:04) Setting Up the Front End with Node and NPM
- [x] (20:00) Migrations and Setting Up SQLite
- [x] (26:00) Designing the UI from Instagram
- [x] (42:12) Adding Username to the Registration Flow
- [x] (58:35) Creating the Profiles Controller
- [x] (1:04:00) RESTful Resource Controller
- [x] (1:09:10) Passing Data to the View
- [x] (1:10:20) Adding the Profiles Mode, Migration and Table
- [x] (1:17:30) Adding Eloquent Relationships
- [x] (1:28:10) Fetching the Record From The Database
- [x] (1:30:00) Adding Posts to the Database & Many To Many Relationship
- [x] (2:04:24) Creating Through a Relationship
- [x] (2:08:12) Uploading/Saving the Image to the Project
    - php artisan storage:link // to connect public to storage
- [x] (2:19:19) Resizing Images with Intervention Image PHP Library
    - composer require intervention/image
- [x] (2:27:42) Route Model Binding
- [x] (2:31:48) Editing the Profile
- [x] (2:46:46) Restricting/Authorizing Actions with a Model Policy
    - php artisan make:policy ProfilePolicy -m Profile
    - Register Policy in AuthServiceProvider
- [x] (2:54:50) Editing the Profile Image
- [x] (3:00:00) Automatically Creating A Profile Using Model Events
 - Using Eloquent Model Events https://laravel.com/docs/7.x/eloquent#events
- [x] (3:12:56) Default Profile Image
- [x] (3:19:48) Follow/Unfollow Profiles Using a Vue.js Component
- [x] (3:31:28) Many To Many Relationship
- [x] (3:46:33) Calculating Followers Count and Following Count
- [x] (3:48:55) Laravel Telescope
   -> Debugger Tracker
- [x] (3:51:44) Showing Posts from Profiles The User Is Following
- [x] (4:01:03) Pagination with Eloquent
- [x] (4:03:25) N + 1 Problem & Solution
- [x] (4:05:21) Make Use of Cache for Expensive Query
- [x] (4:11:44) Sending Emails to New Registered Users

php artisan make:event NameEvent
php artisan make:listener NameListener

event(new NameEvent());

php artisan event:generate // automatically create listener that registered in event provider

- [x] (4:21:51) Wrapping Up
- [x] (4:22:37) Closing Remarks & What's Next In your Learning
-----------------

## Feature
- [x] Login 
- [x] Register
- [x] CRUD POST 
  - [x] Image Thumb.
- [x] CRUD Profile
- [x] Follow Action
- [x] Search 
- [x] CRUD Comment 
- [ ] Multi image upload
- [ ] Tagged Image
- [ ] Direct Message to another account
- [ ] Block / Report an Account
- [ ] Admin Role

- [ ] Add Queue 
- [ ] Add Event+Listeners
- [x] Add Artisan Commands
- [x] Add Policy
- [x] Add Testing
