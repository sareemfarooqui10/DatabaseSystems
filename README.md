The database, named fitlife_db, consists of several tables that are interconnected, which is of a structured fitness training application to manage fitness plans, user information, and 
exercise routines.

**********Tables and Their Purposes**********

admin Table:
Purpose: Stores information about the admin users who can manage the application.
Fields:
admin_id: Primary key, unique identifier for each admin. admin_name, admin_email, admin_pass: Admin details like name, email, and password.

exercise Table:
Purpose: Contains details about different exercises available in the application.
Fields:
exercise_id: Primary key, unique identifier for each exercise. exercise_name, exercise_detail: Name and details of the exercise. plan_id, plan_name: Links each exercise to a 
specific exercise plan.

exercise_plans Table:
Purpose: Stores information about various exercise plans available to users.
Fields:
plan_id: Primary key, unique identifier for each exercise plan. plan_name: Name of the exercise plan. time_duration: Duration of the plan (e.g., 3 months, 4 months). plan_price: Price 
of the exercise plan.

purchased Table:
Purpose: Tracks which exercise plans have been purchased by which users.
Fields:
purchase_id: Primary key, unique identifier for each purchase. plan_id: Foreign key referencing the exercise_plans table, indicating which plan was purchased. user_email: Foreign key 
referencing the user table, indicating who purchased the plan. start_date: Start date of the plan.

user Table:
Purpose: Contains basic information about users who register on the platform.
Fields:
user_id: Primary key, unique identifier for each user. user_fname, user_lname: User's first and last names. user_email: User's email, which is unique and used for login. 
user_password: Password for user authentication.

user_details Table:
Purpose: Stores additional personal details about users.
Fields:
user_detail_id: Primary key, unique identifier for each user detail entry. user_id: Foreign key referencing the user table, linking additional details to the user. user_fname, 
user_lname, user_age, user_height, user_weight, gender, user_dob: Various personal details about the user.

********IMPORTANT*********

- The exercise table references the exercise_plans table, linking exercises to specific plans.
- The purchased table links users to their purchased plans, with foreign keys pointing to the user and exercise_plans tables.
- The user_details table is related to the user table, providing additional personal information about each user.
- Indexes: Primary keys and unique keys are set up to ensure data integrity and optimize query performance.
- AUTO_INCREMENT: Used on primary key fields to automatically generate unique identifiers for new records.
