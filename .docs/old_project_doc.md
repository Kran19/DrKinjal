
EXAM MANAGEMENT SYSTEM
AN INTERNSHIP REPORT
Submitted by

KAYASTHA YASH ALOKE

200202041011


DIPLOMA ENGINEERING

in
Computer Engineering



College of Technology
Aditya Silver Oak Institute of Technology




Silver Oak University, Ahmedabad MAY, 2023
 
 	 

Internal Guide	Head of the Department
 
 
 

 	 


Aditya Silver Oak Institute of Technology
Opp. Bhagwat Vidhyapith, S.G. Highway, Ahmedabad-382481




DECLARATION
We hereby declare that the Internship report submitted along with the Internship entitled EXAM MANAGEMENT SYSTEM submitted in partial fulfillment for the Diploma Engineering in Computer to Silver Oak University, Ahmedabad, is a bonafide record of original project  work  carried  out by me at Myriad Solutionz under the supervision of Mr. Aditya Dugar and that no part of this report has been directly copied from any students’ reports or taken from any other source, without providing due reference.






Name of the Student	Sign of Student
 

ACKNOWLEDGEMENT

I would like to express my sincere appreciation and heartfelt thanks to my mentor, Prof. Happy Patel, for her leadership, attentive supervision, and unwavering support throughout my internship. Her timely advice, valuable insights, and motivational words have been instrumental in shaping my professional growth and personal development. I am truly grateful for the guidance and encouragement that she has generously bestowed upon me, and I am confident that her influence will continue to guide me in my future endeavors.
 

ABSTRACT

This system is designed to manage all exam-related tasks, including online and offline examinations, creation and management of timetables, circulars, and seating arrangements. It will provide various tools to make the process of conducting exams easier and more efficient.

The online exam system will allow students to take exams remotely from any location with an internet connection. It will include features such as multiple choice questions, short answer questions, and essay questions. The system will automatically grade exams and provide instant feedback to students.

For offline exams, the system will provide tools to create and manage exam schedules, including the creation of timetables and seating arrangements. It will allow administrators to easily assign classrooms and exam halls, and ensure that students are seated in an appropriate and secure environment.

The system will also include tools for creating and managing circulars, which can be used to communicate important information about exams to students, such as exam dates, times, and rules. This will help ensure that all students are informed about the exam process and have access to the information they need to prepare for exams.

Overall, this system will help streamline the exam process and make it more efficient and effective. It will help ensure that exams are conducted fairly and securely, and that students have access to the information and resources they need to succeed.
 
LIST OF FIGURES
Fig 1.3.1 Organization Chart	1
Fig 2.3.1 SDLC Model	4
Fig 3.6.1.1 Incremental Model	12
Fig 3.6.1.2 Stage Delivery	13
Fig 3.6.1.3 Parallel Development Model	14
Fig 3.6.3.1 Gannt Chart Till Review-1	16
Fig 3.6.3.2 Gannt Chart Till Review-2	16
Fig 3.6.3.2 Gannt Chart Till Review-3	17
Fig 4.5.2.1 Activity of System	23
Fig 4.8.1.1 Settings	26
Fig 5.1.1.1 Online Exam Use Case Diagram	29
Fig 5.3.2.1.1 YK EXAM SYSTEM Admin Login Page	38
Fig 5.3.2.1.2 YK EXAM SYSTEM Registration Page	39
Fig 5.3.2.1.3 YK EXAM SYSTEM Add Student Page	39
Fig 5.3.2.1.4 YK EXAM SYSTEM Add Staff	40
Fig 5.3.2.1.5 YK EXAM SYSTEM Student Discussion	40
Fig 5.3.2.1.6 YK EXAM SYSTEM Staff Discussion	41
Fig 5.3.2.1.7 YK EXAM SYSTEM Add Circular	41
Fig 5.3.2.1.8 YK EXAM SYSTEM Exam Form	42
Fig 5.3.2.1.9 YK EXAM SYSTEM Add Online Exam	42
Fig 5.3.2.2.1 YK EXAM SYSTEM Admin Dashboard	43
 
Fig 6.2.2.1.1 YK EXAM SYSTEM Admin Dashboard	45
Fig 6.2.2.1.2 YK EXAM SYSTEM Student Analytics	45
Fig 6.2.2.1.3 YK EXAM SYSTEM Add Student	46
Fig 6.2.2.1.4 YK EXAM SYSTEM Student Details	46
Fig 6.2.2.1.5 YK EXAM SYSTEM Student Discussion	47
Fig 6.2.2.1.6 YK EXAM SYSTEM Staff Analytics	47
Fig 6.2.2.1.7 YK EXAM SYSTEM Add Staff	48
Fig 6.2.2.1.8 YK EXAM SYSTEM Staff Data	48
Fig 6.2.2.1.9 YK EXAM SYSTEM Staff Discussion	49
Fig 6.2.2.1.10 YK EXAM SYSTEM Circular Analytics	49
Fig 6.2.2.1.11 YK EXAM SYSTEM Add Circular	50
Fig 6.2.2.1.12 YK EXAM SYSTEM Staff Circulars	50
Fig 6.2.2.1.13 YK EXAM SYSTEM Open Staff Circular	51
Fig 6.2.2.1.14 YK EXAM SYSTEM Student Circulars	51
Fig 6.2.2.1.15 YK EXAM SYSTEM Open Student Circular	52
Fig 6.2.2.1.16 YK EXAM SYSTEM Revenue Analytics	52
Fig 6.2.2.1.17 YK EXAM SYSTEM Online Exam Form Analytics	53
Fig 6.2.2.1.18 YK EXAM SYSTEM Create Exam Form	53
Fig 6.2.2.1.19 YK EXAM SYSTEM Published Exam Form	54
Fig 6.2.2.1.20 YK EXAM SYSTEM Exam Form Details	54
Fig 6.2.2.1.21 YK EXAM SYSTEM Exam Form (Form Submission)	55
Fig 6.2.2.1.22 YK EXAM SYSTEM Online Exam Analytics	55
 
Fig 6.2.2.1.23 YK EXAM SYSTEM Create Online Exam	56
Fig 6.2.2.1.24 YK EXAM SYSTEM Student Exam Submissions	56
Fig 6.2.2.2.1 YK EXAM SYSTEM Staff Assigned Task	57
Fig 6.2.2.2.2 YK EXAM SYSTEM Staff Paper Set Process	57
Fig 6.2.2.3.1 YK EXAM SYSTEM Student Exam Form View	58
Fig 6.2.2.3.2 YK EXAM SYSTEM Student Exam Form Payment	58
Fig 6.2.2.3.3 YK EXAM SYSTEM Student View Online Exams	59
Fig 6.2.2.3.4 YK EXAM SYSTEM Student Attempt Online Exams	59
Fig 6.2.2.3.5 YK EXAM SYSTEM Student Attempt Online Exams-Webcam.60 Fig 6.2.2.3.6 YK EXAM SYSTEM Student View Exam Result	60
Fig 6.2.2.4.1 YK EXAM SYSTEM Input Data of Students	61
Fig 6.2.2.4.2 YK EXAM SYSTEM Output Data (Seating Arrangement)	61
Fig 7.2.1.1 Test Case 1 - Login Validation	66
Fig 7.2.1.2 Test Case 2 - Exam Security	67
Fig 7.2.1.3 Test Case 3 - Online Exam Database	68
Fig 7.2.1.4 Test Case 3 – Exam Scheduled Before	69
Fig 7.2.1.5 Test Case 3 – Exam Scheduled After	69
 
LIST OF TABLES


Table 4.8.1.1 Tools & Technology	26

Table 4.8.2.1 Hardware Configuration	27
Table 4.8.2.2 Software Configuration	27

Table 5.1.1.1 Use Case	29
Table 5.2.1 payment_currencies	30

Table 5.2.2 quotes_master	30
Table 5.2.3 uni_inst_list	31

Table 5.2.4 uni_inst_online_exams	31
Table 5.2.5 uni_inst_online_exam_forms	32

Table 5.2.6 uni_inst_online_exam_form_submissions	33

Table 5.2.7 uni_inst_online_mcq_exam_attempts	33
Table 5.2.8 uni_inst_online_mcq_exam_question_paper	34

Table 5.2.9 uni_inst_online_mcq_exam_responses	34

Table 5.2.10 uni_inst_online_mcq_exam_results	35

Table 5.2.11 uni_inst_staff_chat	35

Table 5.2.12 uni_inst_staff_circulars	35

Table 5.2.13 uni_inst_staff_data	36

Table 5.2.14 uni_inst_student_chat	36

Table 5.2.15 uni_inst_student_circulars	37

Table 5.2.16 uni_inst_student_data	37
Table 7.2.1.1 Test Cases	65
 

LIST OF ABBREVIATIONS



SDLC	Software Development Life Cycle
HTML	Hyper Text Markup Language
CSS	Cascading Style Sheets
PHP	PHP Hypertext Preprocessor
JS	JavaScript
SQL	Structured Query Language
 

TABLE OF CONTENTS
 
Declaration	i
Acknowledgement	ii
Abstract	iii
List of Figures	iv
List of Tables	vii
List of Abbreviations	viii
Table Of Contents	ix
Chapter 1 Overview of the Company	1
1.1	History	1
1.2	Scope of work	1
1.3	Organization chart	1
1.4	Capacity of plant	2
1.4.1	Long Term Capacity	2
1.4.2	Medium Term Capacity	2
1.4.3	Short Term Capacity	2
Chapter 2 Overview of Department	3
2.1	It includes the details about the work being carried out in each department	3
2.1.1	Accounting	3
2.1.2	Flutter Development / Mobile Application Development	3
2.1.3	PHP (Laravel) Development	3
2.1.4	Front-end Development	3
2.2	List the technical specifications of major equipment used in each department	4
2.2.1	Software Technical Specification	4
2.3	Prepare schematic layout of operation for manufacturing of end product	4
2.4	Explain in details about each stage of production	5
Chapter 3 Introduction to Project/Internship and Project/Internship Management	9
3.1	Project Summary	9
3.2	Purpose	9
3.3	Objective	10
3.4	Scope	10
3.5	Technology and Literature Review	11
3.6	Project/Internship Planning	12
3.6.1	Project Development Approach and Justification	12
3.6.2	Project Effort and Time, Cost Estimation	14
3.6.3	Roles and Responsibilities	15
3.7	Project Scheduling (Gantt Chart)	16
Chapter 4 System Analysis	18
4.1	Study of Current System	18
4.2	Problem and Weaknesses of Current System	19
4.3	Requirements of New System	20
4.4	System Feasibility	21
4.4.1	Does the system contribute to the overall of the organization?	21
4.4.2	Can the system be implemented using the current	21
4.4.3	Can the system be integrated with other systems which are already	21
4.5	Activity/Processin g New System/Proposed System	22
4.5.1	Proposed System	22
4.5.2	Activity of System	23
4.6	Features of New System/Proposed System	24
4.7	List Main Modules/Components/Processes/Proposed System	25
4.7.1	Admin	25
4.7.2	Staff	25
4.7.3	Student	25
4.8	Selection of Hardware/Software	26
4.8.1	Tools and Technology	26
4.8.2	Hardware and Software Requirement	27
Chapter 5 System Design	28
5.1	System Design & Methodology	28
5.1.1	Use Case Diagram	28
5.2	Database Design/Data Structure Design	30
5.3	Input/Output and Interface Design	38
5.3.2	Samples of Forms Reports and Interface	38
5.3.2.1	Samples of Forms, Reports and Interface	38
5.3.2.2	Report Layout	43
Chapter 6 Implementation	44
6.1	Implementation Platform/Environment	44
6.2	Process/Program/Technology/Modules Specification(s)	44
6.2.1	Process	44
6.2.2	Modules Specification	45
6.3	Finding/Results/Outcomes	62
6.4	Result Analytics/Comparision/Deliberations	63
Chapter 7 Testing	64
7.1	Testing Plan/Strategy	64
7.1.1	Unit Testing	64
7.1.2	Integration Testing	64
7.1.3	Validation Testing	64
7.1.4	White Box Testing	65
7.2	Test Results and Analysis	65
7.2.1	Test Cases	65
Chapter 8 Conclusion and Discussion	70
8.1 Overall Analysis of Internship/Project Viabilities	70
8.3	Dates of Continuous Evaluation	71
8.4	Problem Encountered and Possible Solutions	71
8.5	Summary of Internship/Project work	71
8.6	Limitation and Future Enhancement	72
References	73
 
1.	Overview of the Company
1.1	History

Established in 2009, Myriad Solutionz is an Ahmadabad based company that caters to an enviable clientele across domains and geographies. Our services portfolio spans across arenas as diverse as Digital Marketing, Web & Software Development and E-Commerce. Myriad is as an exciting place to work at – for innovative, passionate, focused talent and energetic people wanting to grow at a fast pace.
1.2	Scope of Work

In just over a decade, we have garnered an impressive list of satisfied clients who benefited from our E-commerce, web development, software development efforts.
We are a great place to work for talented, focused, driven and passionate individuals. At Myriad, we believe in growing together, at a fast pace. Our innovative and solution oriented approach not only help us grow but our clients as well.
1.3	Organization Chart

Fig 1.3.1 Organization Chart
 

1.4	Capacity Plant

Capacity planning based on the timeline is classified into three main categories long range, medium range and short range.
1.4.1	Long Term Capacity: Long range capacity of an organization is dependent on various other capacities like design capacity, production capacity, sustainable capacity and effective capacity. Design capacity is the maximum output possible as indicated by equipment manufacturer under ideal working condition. Production capacity is the maximum output possible from equipment under normal working condition or day. Sustainable capacity is the maximum production level achievable in realistic work condition and considering normal machine breakdown, maintenance, etc. Effective capacity is the optimum production level under pre-defined job and work-schedules, normal machine breakdown, maintenance, etc.
1.4.2	Medium Term Capacity: The strategic capacity planning undertaken by organization for 2 to 3 years of a time frame is referred to as medium term capacity planning.
1.4.3	Short Term Capacity: The strategic planning undertaken by organization for a daily weekly or quarterly time frame is referred to as short term capacity planning. The ultimate goal of capacity planning is to meet the current and future level of the requirement at a minimal wastage. The three types of capacity planning based on goal are lead capacity planning, lag strategy planning and match strategy planning.
 

2.	Overview of Different Department of the Organization and Layout of the Process being carried out in company
2.1	It Includes the Details About the Work Being Carried in Each Department

2.1.1	Accounting

Financial accounting professionals are responsible for the public reporting of a company or organization's financial status. This work involves collecting and maintaining data, detecting trends and forecasting future needs.
2.1.2	Flutter Development / Mobile Application Development

At our company, we are passionate about Flutter development and are committed to staying up-to-date with the latest trends and best practices. We take pride in our ability to deliver high- quality work on time and within budget, and we are dedicated to building long-lasting relationships with our clients.
2.1.3	PHP(Laravel) Development

At our Laravel development department, we follow a collaborative approach to development, which involves working closely with our clients to understand their requirements and develop solutions that meet their needs. Our team is committed to delivering projects on time, within budget, and to the highest standards of quality.
2.1.4	Front-end Development

Our team specializes in a wide range of front-end development technologies, including HTML, CSS, JavaScript, and various JavaScript frameworks such as React, Angular, and Vue.js. We use the latest front-end development tools and technologies to deliver visually appealing and user- friendly interfaces that provide an exceptional user experience.
 

2.2	List the technical specifications of major equipment used in each department

2.2.1	Software Technical Specification

Technical specification or documentation is a document that every project or product manager must write before starting the actual software development. It has a set of requirements for the product in order for it to work as it was meant to be. This list of requirements has to be met before the development is complete.
Process Equipment Steps:

1)	Consider your customers' feedback. Before diving into a product spec, it's important to know why you need a new product. ...
2)	Open the discussion to your entire organization. ...

3)	Decide which specifications are necessary to include. ...
4)	Perform user testing. ...

5)	Revise, revise, revise.

2.3	Prepare schematic layout which shows the sequence of operation for manufacturing of end product.

Fig 2.3.1 SDLC Model
 

2.4	Explain in details about each stage of production.

The Seven Phases of the SDLC

1.	Planning:

In the Planning phase, project leaders evaluate the terms of the project. This includes calculating labor and material costs, creating a timetable with target goals, and creating the project’s teams and leadership structure. Planning can also include feedback from stakeholders. Stakeholders are anyone who stands to benefit from the application. Try to get feedback from potential customers, developers, subject matter experts, and sales reps. Planning should clearly define the scope and purpose of the application. It plots the course and provisions the team to effectively create the software. It also sets boundaries to help keep the project from expanding or shifting from its original purpose.
2.	Define Requirements:

Defining requirements is considered part of planning to determine what the application is supposed to do and its requirements. For example, a social media application would require the ability to connect with a friend. An inventory program might require a search feature.
Requirements also include defining the resources needed to build the project. For example, a team might develop software to control a custom manufacturing machine. The machine is a requirement in the process.
 


3.	Design and Prototyping :
The Design phase models the way a software application will work. Some aspects of the design include:
	Architecture – Specifies programming language, industry practices, overall design, and use of any templates or boilerplate
	User Interface – Defines the ways customers interact with the software, and how the software responds to input.
	Platforms – Defines the platforms on which the software will run, such as Apple, Android, Windows version, Linux, or even gaming consoles
	Programming – Not just the programming language, but including methods of solving problems and performing tasks in the application
	Communications – Defines the methods that the application can communicate with other assets, such as a central server or other instances of the application
	Security – Defines the measures taken to secure the application, and may include SSL traffic encryption, password protection, and secure storage of user credentials
Prototyping can be a part of the Design phase. A prototype is like one of the early versions of software in the Iterative software development model. It demonstrates a basic idea of how the application looks and works. This “hands-on” design can be shown to stakeholders. Use feedback o improve the application. It’s less expensive to change the Prototype phase than to rewrite code to make a change in the Development phase.
 


4.	Software Development:

This is the actual writing of the program. A small project might be written by a single developer, while a large project might be broken up and worked by several teams. Use an Access Control or Source Code Management application in this phase. These systems help developers track changes to the code.
The coding process includes many other tasks. Many developers need to brush up on skills or work as a team. Finding and fixing errors and glitches is critical. Tasks often hold up the development process, such as waiting for test results or compiling code so an application can run. SDLC can anticipate these delays so that developers can be tasked with other duties.
Software developers appreciate instructions and explanations. Documentation can be a formal process, including wiring a user guide for the application. It can also be informal, like comments in the source code that explain why a developer used a certain procedure. Even companies that strive to create software that’s easy and intuitive benefit from the documentation.
5.	Testing :

It’s critical to test an application before making it available to users. Much of the testing can be automated, like security testing. Other testing can only be done in a specific environment consider creating a simulated production environment for complex deployments. Testing should ensure that each function works correctly. Different parts of the application should also be tested to work seamlessly together—performance test, to reduce any hangs or lags in processing. The testing phase helps reduce the number of bugs and glitches that users encounter. This leads to a higher user satisfaction and a better usage rate.
 


6.	Deployment :

In the deployment phase, the application is made available to users. Many companies prefer to automate the deployment phase. This can be as simple as a payment portal and download link on the company website. It could also be downloading an application on a smartphone. Deployment can also be complex. Upgrading a company-wide database to a newly- developed application is one example. Because there are several other systems used by the database, integrating the upgrade can take more time and effort.
7.	Operations and Maintenance :

At this point, the development cycle is almost finished. The application is done and being used in the field. The Operation and Maintenance phase is still important, though. In this phase, users discover bugs that weren’t found during testing. These errors need to be resolved, which can spawn new development cycles. In addition to bug fixes, models like Iterative development plan additional features in future releases. For each new release, a new Development Cycle can be launched.
 

3.	Introduction to Project
3.1	Project Summary

YK-EXAM SYSTEM is a proposed project that seeks to revolutionize the traditional exam system by creating an online platform for conducting and managing exams in universities and institutes. The main objective of the system is to computerize and automate the existing exam system to reduce the consumption of manpower, time, and work.
The platform will allow teachers to create and customize exams while students can access and take these exams remotely. The system will be user-friendly, intuitive, and secure. It will provide features such as timed exams, automatic grading, and detailed exam reports for teachers.
The automation of exam systems using functionalities like statistics and charts generation and easy data manipulation will help reduce paperwork and improve efficiency, consume fewer human resources, and complete the work in less time.
The implementation of the YK-EXAM SYSTEM project will provide higher education institutions with a competitive advantage, saving time and reducing costs associated with traditional exam systems, and providing a more efficient way of conducting exams. In conclusion, the YK-EXAM SYSTEM project will transform the exam system, making it convenient, cost- effective, and reliable.
3.2	Purpose

The purpose of this project is to create an online platform that provides a more efficient and convenient way of conducting and managing exams in universities and institutes. The project aims to computerize and automate the traditional exam system, reducing manpower, time consumption, and work while improving efficiency and accuracy.
By implementing this project, higher education institutions can save time, reduce costs associated with traditional exam systems, and ensure a more secure, and intuitive exam experience for teachers and students. The project's purpose is to revolutionize the exam system by providing a competitive advantage for universities and institutes, improving the quality of education .
 

3.3	Objective

The objective of the YK-EXAM SYSTEM project is to computerize and automate the traditional exam system in universities and institutes, aiming to reduce the consumption of manpower, time, and work while improving the accuracy and efficiency of exam management.
The project seeks to provide an online platform that is user-friendly, intuitive, and secure, allowing teachers to create and customize exams, while students can access and take exams remotely. The system will include features such as timed exams, automatic grading, and detailed exam reports for teachers.
The project aims to reduce paperwork, improve efficiency, and consume fewer human resources through the automation of exam systems using functionalities like statistics and charts generation and easy data manipulation.
The implementation of the YK-EXAM SYSTEM project will provide higher education institutions with a competitive advantage, saving time and reducing costs associated with traditional exam systems, and providing a more efficient and reliable exam experience for teachers and students. Overall, the project's objective is to transform the exam system and enhance the quality of education in universities and institutes.
3.4	Scope

The scope of the YK-EXAM SYSTEM project is to provide an online platform that computerizes and automates the traditional exam system in universities and institutes. The project will cover the development, deployment, and maintenance of the system, which will include the following features:
1.	User-friendly and intuitive interface for both teachers and students
2.	Customizable exam creation and management system for teachers

3.	Remote exam taking option for students

4.	Timed exams, automatic grading, and detailed exam reports for teachers
 
3.5	Technology and Literature Review

Front End:

The Front end is responsible for collection of input in various forms from the user and processing it to confirm to a specification the back end can use. The front end works as an interface between the user and the back end. The front end for this application is: HTML, CSS, and Bootstrap and Windows and interfaces perfectly with Apache and MySQL. In a word, it covers all the bases and can be executed like a dream on all prominent operating systems.
Back End:

Back end also known as support components of computer system typically refers to the Database Management System (DBMS), which is the storehouse for the data. Basically back and is the system at which the database or data is stored which is manipulated by the user through the front end & Language Used is PHP.
Literature Review

The YK-EXAM SYSTEM project is a timely and relevant innovation in the education industry, which seeks to computerize and automate the traditional exam system in universities and institutes. The project is grounded in extensive research, which highlights the need for a more efficient and reliable exam system that can accommodate the growing demand for online remote exam-taking.
A review of the literature reveals that online exam systems have several benefits over traditional systems, including reduced time and cost, enhanced security, and improved student engagement. Additionally, online systems have been shown to improve exam accuracy, grading consistency, and provide detailed exam reports that help teachers to identify and address areas of weakness.
 

3.6	Project Planning

3.6.1	Project Development Approach and Justification

Software is a program or set of programs containing instructions that provide desired functionality. And Engineering is the process of designing and building something that serves a particular purpose and finds a cost-effective solution to problems.
Incremental process model

Incremental model in software engineering is a one which combines the elements of waterfall model which are then applied in an iterative manner. It basically delivers a series of releases called increments which provide progressively more functionality for the client as each increment is delivered. In incremental model of software engineering, waterfall model is repeatedly applied in each increment. The incremental model applies linear sequences in a required pattern as calendar time passes. Each linear sequence produces an increment in the work.


Fig 3.6.1.1 Incremental Model
 


As from the diagram you can see that there are 5 phases (tasks) which are carried out in each increment. The first increment is often a core product where the basic requirements are addressed and the supplementary features are added in the next increments. The core product is used and evaluated by the client. Once the core product is evaluated by the client there is plan development for the next increment.
Thus in every increment the needs of the client are kept in mind and more features and functions are added and the core product is updated. This process continues till the complete product is produced. The increments earlier to the main increment are called as “stripped down” versions of the final product. These increments form a base for customer evaluation. On this basis client can suggest new requirements if required. If there are less number of employees to work on the project Incremental development model is very useful to complete the project before the deadline. In a project early increments can be done with less number of people. In case if the core product is well-defined and understood more employees can be added if needed in the future increments. One of the benefits of Incremental process model is that it can be planned to manage technical risks.
Types of Incremental Model
1.	Staged Delivery Model – Construction of only one part of the project at a time.


Fig 3.6.1.2 Stage Delivery
 


2.	Parallel Development Model – Different subsystems are developed at the same time. It can decrease the calendar time needed for the development, i.e. TTM (Time to Market) if enough resources are available.


Fig 3.6.1.3 Parallel Development Model

3.6.2	Project Effort and Time, Cost Estimation

3.6.2.1	Effort

Project Planning Project Planning is an aspect of Project Management that focuses a lot on Project Integration. The project plan reflects the current status of all project activities and is used to monitor and control the project.
Project Planning helps in:-

•	Facilitating communication

•	Monitoring/measuring the project progress

•	Provides overall documentation of  assumptions/planning decisions.

The Project Planning Phases can be broadly classified as follows:-

•	Development of the Project Plan

•	Execution of the Project Plan
 

Scheduling

Scheduling of a software project does not differ greatly from scheduling of any multitask engineering effort. Therefore, generalized project scheduling tools and techniques can be applied with little modification to software projects. Project scheduling consists of identifying the tasks needed to complete the project, determine the dependency among different tasks, plan the starting and ending dates for various tasks and determine the chain of tasks that determine the duration of the project. In Project scheduling we decide the order in which to do the tasks.
3.6.2.2	Time

I started this idea of project three months ago, before starting of project I learned the technology. I spent ten or fifteen days in PHP Laravel Learning phase. After this I did find project domain and gathering information about system. Firstly started working on admin panel and then started work on staff side & student side. Applied functionality within three months of the internship.
3.6.2.3	Cost Estimation

An estimate is a prediction based upon probabilistic assessment. It is the responsibility of the project manager to make accurate estimations of effort and cost. This is particularly true for projects subject to competitive bidding where a bid too high compared with competitors would result in loosing the contract or a bid too low could result in a loss to the organization. This does not mean that internal projects are unimportant. From a project leaders estimate the management often decide whether to proceed with the project. Industry has a need for accurate estimates of effort and size at a very early stage in a project.
However, when software cost estimates are done early in the software development process the estimate can be based on wrong or incomplete requirements. A software cost estimate process is the set of techniques and procedures that organizations use to arrive at an estimate. An important aspect of software projects is to know the cost. The major contributing factor is effort.
3.6.3	Roles and Responsibility

•	In this Project all the work done by Me.
•	All the Project Responsibility Carried Out by me as it is a Individual Project.
 


Project Scheduling Gantt Chart Gantt Chart (Review-1)


Fig 3.6.3.1 – Gannt Chart Till Review-1

Gantt Chart (Review-2)


Fig 3.6.3.2 – Gannt Chart Till Review-2
 


Gantt Chart (Review-3)


Fig 3.6.3.3 – Gannt Chart Till Review-3
 
4.	System Analysis
4.1	Study of Current System

In many universities around the world, the current examination system is typically based on a combination of written exams, essays, and other assignments. These exams are typically held at the end of each semester or academic year and are used to assess the students' understanding of the course material and their ability to apply this knowledge in a real- world context.
While this traditional exam system has been in use for many years, there are some concerns about its effectiveness and fairness. For example, some students may find it difficult to perform well in high-pressure exam situations, and there is also the risk of plagiarism or cheating.
To address these concerns, some universities are now exploring alternative assessment methods, such as project-based assessments, group presentations, and online exams. These alternative methods can provide a more flexible and diverse range of assessment options, which can help to better capture the students' knowledge and skills.
However, there are also some potential drawbacks to these alternative assessment methods, including the risk of bias and subjectivity in grading and the need for new tools and technologies to support the assessment process.
Overall, it is clear that the examination system used in universities is undergoing significant changes, driven by a need to better reflect the needs and abilities of modern students. As these changes continue to evolve, it will be important to strike a balance between traditional exam- based assessments and new, more innovative approaches that can better support the diverse needs of today's students.
 

4.2	Problem and Weakness of current system

Here are ten weaknesses of the current examination system conduction way:

High pressure: Exams are often stressful and high-pressure situations, w hich can negatively impact students' performance and well-being.
Inflexibility:	Exams are typically inflexible and do not allow for individualized accommodations or adjustments to suit students' learning styles or needs.
Limited assessment: Exams often assess only a limited range of knowledge and skills, which may not accurately reflect students' overall abilities.
Emphasis on memorization: Exams often emphasize memorization of information rather than critical thinking, problem-solving, or practical application.
Lack of feedback: Students may not receive detailed feedback on their exam
performance, making it difficult for them to identify areas where they need to improve.

Limited creativity: Exams often focus on rote learning and may not allow students to demonstrate their creativity or unique perspectives.
Limited opportunities for collaboration: Exams are typically individual assessments, which may not provide opportunities for students to work collaboratively and learn from each other.
Risk of cheating: There is a risk of cheating during exams, which can undermine the integrity of the assessment process.
 

4.3	Requirements of New System

The requirements of a new examination system may vary depending on the specific context and goals of the educational institution. However, some common requirements of a new system could include:
Validity and reliability: A new system must be designed to provide a valid and reliable assessment of students' knowledge and skills, ensuring that the results accurately reflect their abilities.
Flexibility: A new system should be flexible enough to accommodate a range of learning styles and needs, allowing for individualized assessments and providing opportunities for students to demonstrate their unique strengths.
Accessibility: A new system should be designed to be accessible to all students, including those with disabilities or other special needs.
Fairness: A new system should be fair and impartial, providing all students with an equal opportunity to succeed.
Security: A new system should be designed to minimize the risk of cheating or other forms of academic misconduct.
Feedback: A new system should provide detailed feedback to students, helping them to understand their strengths and weaknesses and providing guidance on how to improve.
Innovation: A new system should be innovative and forward-thinking, incorporating the latest technologies and assessment methods to provide a cutting-edge learning experience.
Sustainability: A new system should be designed to be sustainable, taking into account the environmental impact and long-term costs of the assessment process.
Overall, a new examination system should be designed to provide a more effective and equitable assessment of students' knowledge and skills, while also creating a supportive and inclusive learningenvironment that promotes collaboration, creativity, and innovation.
 

4.4	System Feasibility

4.4.1	Does the system contribute to the overall objectives of the organization?

No this Project Tittle is has to be not a Part of Organization YK-EXAM SYSTEM does not Contribute any types Of Module and Function in Company It is my Individual Project

4.4.2	Can the system be implemented using the current technology and within the given cost and schedule constraints.
Yes, System can be Implemented Using Current New Technology and Project is also Design and Worked According to Prepared Scheduled and Planning.

4.4.3	Can the system be integrated with other systems which are already in place?

No this domain is not integrated with any other sites because it is new project of idea which is design and implemented with latest technology.
 

4.5	Activity/Proposed System

4.5.1	Proposed System

The YK EXAM SYSTEM is a proposed computerized exam management system that seeks to revolutionize the traditional exam system in universities and institutes. The proposed system will be designed to automate the maintenance of exam data, records, instructions, and student information within the institution. The system will be an online platform that stores all the necessary information, including student and staff records, and allows for both online and offline exam management.
The proposed system will feature several automated functionalities, which will help to reduce paperwork, improve efficiency, save time, and reduce the consumption of human resources. The system will feature a user-friendly and intuitive interface that will be accessible to both teachers and students, enabling them to create, manage and take exams remotely.
Teachers will have access to customizable exam creation and management tools that will allow them to set up timed exams, automatic grading, and detailed exam reports. The system will also offer easy data manipulation and statistics and charts generation to facilitate efficient exam management.
Security and privacy features will be integrated into the system to ensure the integrity of the exam process. The proposed system will undergo comprehensive testing to ensure its quality, and training will be provided to teachers and students to ensure efficient and effective usage.
Overall, the proposed YK EXAM SYSTEM aims to provide a cost-effective, efficient, and convenient alternative to traditional exam systems in universities and institutes. By adopting this system, institutions can enhance the quality of education and provide a competitive advantage in the industry.
 


4.5.2	Activity of System

An activity diagram is a behavioral diagram i.e. it depicts the behavior of a system. An activity diagram portrays the control flow from a start point to a finish point showing the various decision paths that exist while the activity is being executed.


Fig 4.5.2.1 Activity of System
 

4.6	Features of New System

The application has the following features:

Online Exam Management: The system allows for online exam management, which reduces the need for physical presence and increases accessibility to students.
Offline Exam Management: The system also supports offline exam management, which enables students to take exams without an internet connection.
Student Information Management: The system maintains accurate and up-to-date student information, including personal data, academic records, and exam performance.
Staff Records Management: The system stores staff records, including academic qualifications, courses taught, and administrative responsibilities.
Automation: The system automates various exam management tasks, reducing the need for manual data entry and paperwork.
Easy Data Manipulation: The system enables easy data manipulation, allowing for quick and accurate data analysis.
Statistics and Charts Generation: The system generates statistics and charts, enabling administrators to make informed decisions based on exam performance and trends.
Less Time Consumption: The system reduces the time required for exam management tasks, freeing up time for administrators and faculty to focus on other tasks.
Reduced Manpower: The system reduces the need for manpower, as it automates various tasks and eliminates the need for manual data entry.
 

4.7	List Main Modules

This application is divided into 3 Modules – Admin, Staff, Student, Here the Admin can do any work related to Circulars, Exams, Staff/Student Management.
4.7.1	Admin

Admin has all rights, admin can add/edit/remove staff & students from the list. Admin can post circulars with full customization
Admin has access to all the exam forms & can create & view responses Admin can create exams, view exams, publish result, assign a task Admin can view student & staff group chats
4.7.2	Staff

Staff can view and send messages in the staff group Staff can view circulars
Staff can set the question paper

4.7.3	Student

Student can view and send messages in the student group Student can view circulars
Student can submit exam forms Student can attempt exams Student can view results
 

4.8	Selection of Hardware / Software
4.8.1	Tools and Technology:



Fig 4.8.1.1 Settings



Type of Application	Website
Front End	HTML, CSS, JavaScript, Bootstrap
Back End	PHP, MySQL
Documentation Generation Tool	MicrosoftWord2019
Application Software	Visual Studio, XAMPP

Table 4.8.1.1 Tools & Technology
 


4.8.2	Hardware and Software Requirement


Hardware Configuration:

Server Side	Corei3 1GB RAM Hard Disk:1 GB
Client Side	Any Machine capable of running
browser with JavaScipt Enabled 512MB RAM

Table 4.8.2.1 Hardware Configuration


Software Configuration

Server Side	Linux
Client Side	Any	operating	system	internet access.
Table 4.8.2.2 Software Configuration
 

5.	System Design
5.1	System Design & Methodology
A UML diagram is a diagram based on the UML (Unified Modeling Language) with the purpose of visually representing a system along with its main actors, roles, actions, artifacts or classes, in order to better understand, alter, maintain, or document information about the system.

5.1.1	USE CASE DIAGRAM
UML Use Case Diagrams can be used to describe the functionality of a system in a horizontal way. That is, rather than merely representing the details of individual features of your system, UCDs can be used to show all of its available functionality.
UCDs have only 4 major elements: The actors that the system you are describing interacts with, the system itself, the use cases, or services, that the system knows how to perform, and the lines that represent relationships between these elements.
Sr.
No.	Symbol	Represents	Description
1.	
 
Actor	Actor	Actor are the users of a system or another system that will interact with system. When one system is actor of another system, label
The actor system with actor stereotype.
2.	
 	System	Draw your system's boundaries using a rectangle that contains use cases. Place actors outside the system's boundaries.
3.	
 	Usecase	It is the external view of the system that represents some actions the user might perform.
4.	

 	Relationship	It represents the connection between these elements and is also known as association.
Table 5.1.1.1 UseCase
 


 

Fig 5.1.1.1 Online Exam Use Case Diagram
 

5.2	Database Design

5.2.1	payment_currencies


SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	ID	int	11	Not null
2		currency_name	varchar	150	Not null
3		currency_code	varchar	150	Not null
4		Timestamp	timestamp		Not null
Table 5.2.1 payment_currencies
5.2.2	quotes_master


SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	quote_id	int	11	Not null
2		Quote	varchar	250	Not null
Table 5.2.2 quotes_master
5.2.3	uni_inst_list

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1		Name	varchar	64	Not null
2	Unique	Email	varchar	100	Not null
3	Primary Key	uni_inst_name	varchar	100	Not null
4		uni_inst_address	varchar	150	Not null
5		Designation	varchar	50	Not null
6		phone_no	varchar	15	Not null
7		DOB	date		Not null
8		Password	varchar	64	Not null
9		photo_filename	varchar	100	Not null
10		active_status	varchar	50	Not null
 


11		ac_creation_time	timestam		Not null
Table 5.2.3 uni_inst_list
5.2.4	uni_inst_online_exams

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	Exam_id	int	11	Not null
2		Exam_name	varchar	100	Not null
3		Subject_name	varchar	100	Not null
4		Total_questions	int	11	Not null
5		Positive_marks	double		Not null
6		Negative_marks	double		Not null
7		Start_exam_date	varchar	50	Not null
8		Start_exam_time	varchar	50	Not null
9		End_exam_date	varchar	50	Not null
10		End_exam_time	varchar	50	Not null
11		Exam_agreement	longtext		Not null
12		Ufm_detection	int	11	Not null
13		Exam_type	varchar	10	Not null
14		Paper_setter	varchar	100	Not null
15		Exam_status	varchar	50	Not null
16		Student_list	longtext		Not null
17		Question_paper_sta
us	int	11	Not null
18		Result_status	int	11	Not null
19		Belongs_to	varchar	150	Not null
20		Linked_with	int	11	Not null
21		Uni_inst_logo	longtext		Not null
22		Auth_sign	longtext		Not null
23		Timestamp	timestam		Not null
Table 5.2.4 uni_inst_online_exams
 


5.2.5	uni_inst_online_exam_forms


SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	Exam_form_id	int	11	Not null
2		Exam_form_name	varchar	200	Not null
3		Associated_exams	longtext		Not null
4		Belongs_to	varchar	200	Not null
5		Upi_id	varchar	500	Not null
6		Exam_fees	double		Not null
7		Exam_desc	longtext		Not null
8		Currency	varchar	30	Not null
9		Payee_name	varchar	100	Not null
10		Trans_text	longtext		Not null
11		Last_date_time	varchar	100	Not null
12		Students_targeted	longtext		
13		Uni_inst_logo	longtext		
14		Auth_sign	longtext		
15		Qr_code	longtext		
16		Timestamp	timestamp		
Table 5.2.5 uni_inst_online_exam_forms
5.2.6	uni_inst_online_exam_form_submissions

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	submission_id	int	11	Not null
2		Exam_form_id	int	11	Not null
3		Student_email	varchar	200	Not null
4		Belongs_to	varchar	250	Not null
5		Form_status	varchar	30	Not null
6		Transaction_id	bigint	20	Not null
7		Reference_numbe	bigint	20	Not null
 


8		Transaction_proof	longtext		Not null
9		Fees_amount	varchar	10	Not null
10		Timestamp	timestamp		
Table 5.2.6 uni_inst_online_exam_form_submissions


5.2.7	uni_inst_online_mcq_exam_attempts

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	ID	int	11	Not null
2		Email	varchar	100	Not null
3		Belongs_to	varchar	100	Not null
4		Exam_id	int	11	Not null
5		Total_attempted_q
uestions	int	11	Not null
6		Login_count	int	11	Not null
7		In_time	timestamp		Not null
8		Submission_time	timestamp		Null
9		Result_id	int	11	Not null
10		Recorded_speech_
ext	longtext		Null
11		Exam_token	varchar	100	Not null
Table 5.2.7 uni_inst_online_mcq_exam_attempts
5.2.8	uni_inst_online_mcq_exam_question_paper

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	Question_id	int	11	Not null
2		Exam_id	int	11	Not null
3		Exam_form_id	int	11	Not null
4		Question_index	int	11	Not null
5		Question_data	longtext		Not null
 


6		Option_a	longtext		Not null
7		Option_b	longtext		Not null
8		Option_c	longtext		Not null
9		Option_d	longtext		Not null
10		Correct_answer	longtext		Not null
11		Set_by	int	11	Not null
12		Timestamp	Timestamp		Not null
Table 5.2.8 uni_inst_online_mcq_exam_question_paper


5.2.9	uni_inst_online_mcq_exam_responses

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	ID	int	11	Not null
2		Exam_id	int	11	Not null
3		Email	varchar	100	Not null
4		Belongs_to	varchar	100	Not null
5		Question_index	int	11	Not null
6		Selected_option	varchar	100	Not null
7		Correct_option	varchar	100	Not null
8		Exam_token	varchar	100	Not null
9		Response_time	timestamp		Not null
Table 5.2.9 uni_inst_online_mcq_exam_responses


5.2.10	uni_inst_online_mcq_exam_results

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	Result_id	int	11	Not null
2		Student_email	varchar	100	Not null
3		Exam_id	varchar	100	Not null
4		Belongs_to	varchar	100	Not null
5		Marks	varchar	100	Not null
 


6		Timestamp	timestamp		Not null
Table 5.2.10 uni_inst_online_mcq_exam_results


5.2.11	uni_inst_staff_chat

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	Msg_id	int	11	Not null
2		Email	varchar	100	Not null
3		Sender_name	varchar	100	Not null
4		Sender_photo	varchar	200	Not null
5		Msg_content	longtext		Not null
6		Belongs_to	varchar	100	Not null
7		Isadmin	varchar	10	Not null
8		Timeinfo	timestamp		Not null
Table 5.2.11 uni_inst_staff_chat


5.2.12	uni_inst_staff_circulars

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	circular_id	int	11	Not null
2		Circular_title	varchar	250	Not null
3		Circular_desc	longtext		Not null
4		Belongs_to	varchar	100	Not null
5		Circular_logo	text		Not null
6		Signature_logo	text		Not null
7		Posted_by	varchar	150	Not null
8		Priority_text	varchar	100	Not null
9		Priority_color	varchar	100	Not null
10		Priority_meter	varchar	100	Not null
11		Circular_timeinfo	timestamp		Not null
Table 5.2.12 uni_inst_staff_circulars
 


5.2.13	uni_inst_staff_data

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	ID	int	11	Not null
2		Email	varchar	100	Not null
3		Name	varchar	100	Not null
4		Belongs_to	varchar	100	Not null
5		Extrainfo	varchar	100	Not null
6		Password	varchar	100	Not null
7		Facphoto	varchar	100	Not null
8		Active_status	varchar	50	Not null
9		Timestamp	timestamp		Not null
Table 5.2.13 uni_inst_staff_data


5.2.14	uni_inst_student_chat

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	Msg_id	int	11	Not null
2		Email	varchar	100	Not null
3		Sender_name	varchar	100	Not null
4		Sender_photo	varchar	200	Not null
5		Msg_content	longtext		Not null
6		Belongs_to	varchar	100	Not null
7		Isadmin	varchar	10	Not null
8		Timeinfo	timestamp		Not null
Table 5.2.14 uni_inst_student_chat
 


5.2.15	uni_inst_student_circulars

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	circular_id	int	11	Not null
2		Circular_title	varchar	250	Not null
3		Circular_desc	longtext		Not null
4		Belongs_to	varchar	100	Not null
5		Circular_logo	text		Not null
6		Signature_logo	text		Not null
7		Posted_by	varchar	150	Not null
8		Priority_text	varchar	100	Not null
9		Priority_color	varchar	100	Not null
10		Priority_meter	varchar	100	Not null
11		Circular_timeinfo	timestamp		Not null
Table 5.2.15 uni_inst_student_circulars


5.2.16	uni_inst_student_data

SR.NO	KEY
NAME	NAME	DATA
TYPE	SIZE	CONSTRAINT
1	Primary Key	ID	int	11	Not null
2		Email	varchar	100	Not null
3		Name	varchar	100	Not null
4		Belongs_to	varchar	100	Not null
5		Extrainfo	varchar	100	Not null
6		Password	varchar	100	Not null
7		Stuphoto	varchar	100	Not null
8		Active_status	varchar	100	Not null
9		Timestamp	timestamp		Not null
Table 5.2.16 uni_inst_student_data
 

5.3	Input/Output and Interface Design
5.3.2	Samples of Forms, Reports and Interface
5.3.2.1	Form Layout

•	Various forms are created for this website for admin, staff as well as students.

•	A form provides an easy way to view data.

•	Using forms, data can be entered easily. This saves time and prevents typographical errors.
•	Forms present data in an attractive format with special fonts and other graphical effects such as color and shading.
•	Forms offer the most convenient layout for entering, changing and viewing records present in the database.
•	An entry field in a form can present a list of valid values from which users can pick to fill out the field easily.
The admin can authenticated with help of login form.


Fig 5.3.2.1.1 YK EXAM SYSTEM Admin Login Page
 


The Admin can be registered from the Registration Form


Fig 5.3.2.1.2 YK EXAM SYSTEM Registration Page The students can be added from this panel

Fig 5.3.2.1.3 YK EXAM SYSTEM Add Student Page
 


The staffs can be added through this form


Fig 5.3.2.1.4 YK EXAM SYSTEM Add Staff

Chat Discussion (Form Based) for Students


Fig 5.3.2.1.5 YK EXAM SYSTEM Student Discussion
 


Chat Discussion (Form Based) for Staff


Fig 5.3.2.1.6 YK EXAM SYSTEM Staff Discussion

Add a Circular


Fig 5.3.2.1.7 YK EXAM SYSTEM Add Circular
 


Add a Exam Form


Fig 5.3.2.1.8 YK EXAM SYSTEM Exam Form

Add a Online Exam


Fig 5.3.2.1.9 YK EXAM SYSTEM Add Online Exam
 


5.3.2.2	Report Layout

Analysing and presenting data are just as important as entering and sorting these out. Computer systems use reporting and query applications to retrieve the data that are available in the database and present it in a way that provides useful information, drives decision -making and supports business projects. A report presents data as meaningful information, which can be used and distributed. A report is the information that is organized and formatted to fit the required specification. It is a passive document that contains only predefined data and is used solely for viewing and reading. Reports can be printed on paper, or these may be transferred to a computer file, a visual display screen, etc. Reports are the most visible component of a working information system and hence they often form the basis for the users and management’s final assessment of the systems value.
•	We can organize and present data in groups.

•	We can calculate running totals, group totals, grand totals, percentage of totals, etc.

•	We can present data in an attractive format with pictures, special fonts and lines.

•	We can create a design for a report and save it so that we can use it over and over again.

This is the home page of admin dashboard where he/she can get all the reports (data) about many details like Exam Analytics, Pending Exams & Results, Student/Staff Count, Active Staffs etc…


Fig 5.3.2.2.1 YK EXAM SYSTEM Admin Dashboard
 

6.	Implementation
6.1	Implementation Platform

The YK-EXAM SYSTEM has been designed to be implemented on a variety of platforms, but the coding is done in PHP, a popular and widely-used scripting language. PHP is a server-side language that can be run on multiple platforms, including Windows, Linux, and macOS.
The system can be implemented on a web server, and it is compatible with popular web servers such as Apache and Nginx. Additionally, it uses MySQL as the database management system, which is a widely-used open-source database system.
The system has been designed to be highly scalable, allowing it to be easily customized and adapted to meet the specific needs of universities and institutes. Its modular design allows for the addition of new features and functionality as needed, and its user-friendly interface makes it easy to use for both administrators and students.
Overall, the implementation platform for the YK-EXAM SYSTEM has been carefully chosen to ensure maximum compatibility, flexibility, and scalability, while also ensuring that it is cost-effective and easy to maintain.
6.2	Process/Modules Specification

6.2.1	Process

The following steps are required to run the application successfully:

1.	Install the Visual studio code and Xampp Server

2.	Configure DATABASE Using MySQL & PHPMyAdmin

3.	Configure the Xampp server, and import the project file into visual studio.

4.	After that create virtual environment for project.
 


6.2.2	Modules Specifications

6.2.2.1	Admin View


Fig 6.2.2.1.1 YK EXAM SYSTEM Admin Dashboard

Student Management Panel :


Fig 6.2.2.1.2 YK EXAM SYSTEM Student Analytics
 


 

Fig 6.2.2.1.3 YK EXAM SYSTEM Add Student





Fig 6.2.2.1.4 YK EXAM SYSTEM Student Details
 



 


Fig 6.2.2.1.5 YK EXAM SYSTEM Students Discussion

Staff Management Panel :


Fig 6.2.2.1.6 YK EXAM SYSTEM Staff Analytics
 



 


Fig 6.2.2.1.7 YK EXAM SYSTEM Add Staff


Fig 6.2.2.1.8 YK EXAM SYSTEM Staff Data
 


 

Fig 6.2.2.1.9 YK EXAM SYSTEM Staff Discussion

Circular Panel :


Fig 6.2.2.1.10 YK EXAM SYSTEM Circular Analytics
 


 

Fig 6.2.2.1.11 YK EXAM SYSTEM Add Circular


Fig 6.2.2.1.12 YK EXAM SYSTEM Staff Circulars
 


 

Fig 6.2.2.1.13 YK EXAM SYSTEM Open Staff Circular


Fig 6.2.2.1.14 YK EXAM SYSTEM Student Circulars
 


 

Fig 6.2.2.1.15 YK EXAM SYSTEM Open Student Circular

Online Exams :


Fig 6.2.2.1.16 YK EXAM SYSTEM Revenue Analytics
 


 

Fig 6.2.2.1.17 YK EXAM SYSTEM Online Exam Form Analytics


Fig 6.2.2.1.18 YK EXAM SYSTEM Create Exam Form
 


 

Fig 6.2.2.1.19 YK EXAM SYSTEM Published Exam Forms


Fig 6.2.2.1.20 YK EXAM SYSTEM Exam Form Details
 


 

Fig 6.2.2.1.21 YK EXAM SYSTEM Exam Form (Form Submissions)


Fig 6.2.2.1.22 YK EXAM SYSTEM Online Exam Analytics
 


 

Fig 6.2.2.1.23 YK EXAM SYSTEM Create Online Exam


Fig 6.2.2.1.24 YK EXAM SYSTEM Student Exam Submissions
 


6.2.2.2	Staff View


Fig 6.2.2.2.1 YK EXAM SYSTEM Staff Assigned Task


Fig 6.2.2.2.2 YK EXAM SYSTEM Staff Paper Set Process
 


6.2.2.3	Student View


Fig 6.2.2.3.1 YK EXAM SYSTEM Student Exam Form View


Fig 6.2.2.3.2 YK EXAM SYSTEM Student Exam Form Payment
 


 

Fig 6.2.2.3.3 YK EXAM SYSTEM Student View Online Exams


Fig 6.2.2.3.4 YK EXAM SYSTEM Student Attempt Online Exams
 


 

Fig 6.2.2.3.5 YK EXAM SYSTEM Student Attempt Online Exams (Webcam)


Fig 6.2.2.3.6 YK EXAM SYSTEM Student View Exam Result
 


6.2.2.4	Offline Exam Seating Arrangement


Fig 6.2.2.4.1 YK EXAM SYSTEM Input Data of Students


Fig 6.2.2.4.2 YK EXAM SYSTEM Output Data (Seating Arrangement)
 

6.3	Finding/Results/Outcomes

The implementation of the YK-EXAM SYSTEM is expected to have several positive outcomes, including:
Increased Efficiency: The automation of exam management tasks will reduce the time and effort required by administrators and faculty, increasing overall efficiency.
Improved Accuracy: The system will maintain accurate and up-to-date student and staff records, reducing the risk of errors and improving the accuracy of data analysis.
Enhanced Accessibility: The online exam management feature will make it easier for students to access exams, increasing accessibility and reducing the need for physical presence.
Better Data Analysis: The system's statistics and charts generation feature will allow administrators to analyze exam performance data more easily and make informed decisions based on trends.
Reduced Costs: The system will reduce the need for manual data entry and paperwork, reducing administrative costs and increasing cost-effectiveness.
Improved Security: The system will provide better security for student and staff records, reducing the risk of data breaches and unauthorized access.
Increased Competitiveness: The implementation of the YK-EXAM SYSTEM will provide a competitive advantage to universities and institutes, as it will enable them to provide a more efficient and effective exam management system to their students and faculty.
Overall, the implementation of the YK-EXAM SYSTEM is expected to have a positive impact on the efficiency, accuracy, accessibility, cost-effectiveness, and competitiveness of universities and institutes that adopt it.
 

6.4	Result Analysis/Comparision/Deliberations

The YK-EXAM SYSTEM offers several advantages over traditional paper-based exam management systems, including increased efficiency, accuracy, and accessibility, as well as better data analysis and improved security.
Compared to manual exam management systems, the YK-EXAM SYSTEM offers significant time and cost savings, as it automates many of the time-consuming administrative tasks associated with exam management, such as data entry and record keeping. The system also reduces the need for physical presence, making it more convenient and accessible for students.
In terms of data analysis, the YK-EXAM SYSTEM provides a comprehensive and accurate picture of student performance, allowing administrators to identify trends and make informed decisions about curriculum development and resource allocation.
Furthermore, the system's security features ensure that student and staff records are kept confidential and secure, reducing the risk of data breaches and unauthorized access.
Overall, the YK-EXAM SYSTEM offers a more efficient, accurate, and secure approach to exam management, providing a competitive advantage to universities and institutes that adopt it. The system's automation, accessibility, and data analysis features make it a valuable tool for administrators and faculty seeking to improve the quality of their educational programs and the overall learning experience of their students.
 
7.	Testing
7.1	Testing Plan / Strategy

7.1.1	Unit Testing

Unit testing emphasizes the verification effort on the smallest unit of software design i.e.; a software component or module. Unit testing is a dynamic method for verification, where program is actually compiled and executed. Unit testing is performed in parallel with the coding phase. Unit testing tests units or modules not the whole software. I have tested each view/module of the application individually. As the modules were built up testing was carried out simultaneously, tracking out each and every kind of input and checking the corresponding output until module is working correctly.
7.1.2	Integration Testing

In integration testing a system consisting of different modules is tested for problems arising from component interaction. Integration testing should be developed from the system specification. Firstly, a minimum configuration must be integrated and tested. In my project I have done integration testing in a top down fashion i.e. in this project I have started construction and testing with atomic modules. After unit testing the modules are integrated one by one and then tested the system for problems arising from component interaction
7.1.3	Validation Testing

It provides final assurances that software meets all functional, behavioral & performance requirement. Black box testing techniques are used. There are three main components - Validation test criteria (no. in place of no. & char in place of char) - Configuration review (to ensure the completeness of s/w configuration.) - Alpha & Beta testing-Alpha testing is done at developer’s site i.e. at home & Beta testing once it is deployed. Since I have not deployed my application, I could not do the Beta testing.
 


7.1.4	White Box Testing

In white box testing knowing the internal working of the product, tests can be conducted to ensure that internal operations are performed according to specification and all internal components have been adequately exercised. In white box testing logical path through the software are tested by providing test cases that exercise specific sets of conditions and loops.
Using white-box testing software developer can derive test case that

•	Guarantee that all independent paths within a module have been exercised at least once.
•	Exercise all logical decisions on their true and false side.

•	Exercise all loops at their boundaries and within their operational bound.

•	Exercise internal data structure to ensure their validity.

At every stage of project development I have tested the logics of the program by supplying the invalid inputs and generating the respective error messages. All the loops and conditional statements are tested to the boundary conditions and validated properly.
7.2	Tests Results and Analysis

7.2.1	Test Cases

ID	Test Condition	Expected Output	Actual Output	Remark
1	Login Validation	Login Failed	Login Failed	No Remarks
2	Exam Security	Will Redirect to Login Page & will not allow to give exam	Will Redirect to Login Page & will not allow to
give exam	No Remarks
3	Exam Date/Time Validation	Exam Will be Not Accessed	Exam Will be Not Accessed	No Remarks
Table 7.2.1.1 Test Cases
 


	TEST ID-1

Test Condition – Login Validation Data – Wrong Credentials Expected Output – Login Failed Actual Output – Login Failed
 
Fig 7.2.1.1 Test Case 1 – Login Validation
 


	TEST ID-2

Test Condition – Exam Security

Data – Trying to Access the Exam using POSTMAN Directly

Expected Output – Will Redirect to Login Page & Not allow student to give exam

Actual Output – Redirect on Login Page

Fig 7.2.1.2 Test Case-2 Exam Security
 


	TEST ID-3

Test Condition – Exam Date/Time Validation

Data – Trying to Access the Exam using After Exam In-Time Ends Expected Output – Will Not allow to give exam & will redirect to Exam Page Actual Output – Will Not allow to give exam & will redirect to Exam Page
 
Fig 7.2.1.3 Test Case-3 Online Exam Database
 



 
Fig 7.2.1.4 Test Case-3 Exam Scheduled Before


Fig 7.2.1.5 Test Case-3 Exam Scheduled After
 

8.	Conclusion and Discussion

8.1	Overall Analysis of Project Viabilities

The following are the main analysis points of the project viability:

Technical Feasibility: The YK-EXAM SYSTEM has been found to be technically feasible, with the use of PHP coding language and MySQL database management system providing a stable and reliable platform for the system.
Economic Feasibility: The project is economically feasible as the costs associated with development, implementation, and maintenance of the system are reasonable and can be easily justified by the benefits of the system.
Operational Feasibility: The System has been designed to be user-friendly and easy to operate. The system can be easily integrated into existing exam management processes with minimal disruption.
Schedule Feasibility: The project has been developed and implemented within the expected timeframe, with no significant delays or setbacks encountered during the development process.
Legal Feasibility: The System complies with all legal requirements and regulations, including data protection laws and regulations.
Social Feasibility: The system has the potential to improve the educational experience of students by reducing the time and effort required for exam management, and providing more accurate and comprehensive data analysis.
Organizational Feasibility: The System is compatible with existing organizational structures and processes, and has the potential to streamline exam management, reduce costs, and improve efficiency.
Environmental Feasibility: The system is environmentally friendly, as it reduces the need for paper-based exam management processes and physical presence, resulting in reduced paper consumption and carbon footprint.
Overall, the YK-EXAM SYSTEM has been found to be a viable project with significant potential to improve exam management processes.
 

8.3	Dates of Continuous Evaluation i.e Internal Review-1 & Review-2

First Review –23rd February 2023 Second Review – 8th April 2023
8.4	Problem Encountered and Possible Solutions

When I started coding in my project, many bugs came & many errors came, I solved those errors & my debugging skill was improved a lot.
Following Major Problems were encountered

1.	Security Bug in Online Exam System

Solution : I have added tokens for authentication of a student.

2.	QR Code (Base 64 Generation Issue)

Solution : Fixed by adding more libraries supporting QR-Code

3.	Exam Answers Sending/Marks Bug

Solution : Fixed this by adding more optimized and alternative code.


8.5	Summary of Internship/Project Work
During the internship/project work on the YK-EXAM SYSTEM, the main objective was to computerize the existing exam management system and reduce manpower, time consumption, and work. The proposed system deals with the maintenance of exam data, records, instructions, and student information within the university/institute. The system is an automation system that is used to store information, student records, staff records, online exam management, and offline exam management.
The automated systems within the YK-EXAM SYSTEM help to reduce paperwork, improve efficiency, less time consumption, easy data manipulation, statistics and charts generation, and less consumption of human resources. The implementation platform for the system was PHP coding language and MySQL database management system.
 


The project outcomes included a user-friendly and easy-to-operate exam management system that complies with all legal requirements and regulations. The system has the potential to improve the educational experience of students by reducing the time and effo rt required for exam management, and providing more accurate and comprehensive data analysis. The YK- EXAM SYSTEM has been found to be a viable project, with significant potential to improve exam management processes and enhance the educational experience of students.

8.6	Limitation and Future Enhancement
The YK-EXAM SYSTEM is a comprehensive and efficient system for managing exams in educational institutions. However, like any other system, it has its limitations and scope for future enhancements.
One of the limitations of the system is its dependency on stable and high-speed internet connectivity. In case of low connectivity, the system may not function optimally, leading to delays and disruptions in the exam management process.
Another limitation is that the system may require periodic updates and maintenance to ensure that it is compatible with the latest technological advancements and legal requirements. This can be time-consumingand expensive, depending on the size and complexity of the system.
In terms of future enhancements, the YK-EXAM SYSTEM can be further developed to include features such as biometric authentication, advanced data analysis tools, and automated grading systems. These enhancements can help to improve the accuracy and efficiency of the system, and provide a more seamless and integrated experience for students and staff.
Overall, the YK-EXAM SYSTEM is a valuable tool for managing exams in educational institutions, but it is important to be aware of its limitations and to explore opportunities for future enhancements to ensure that it remains relevant and effective in the long term.
 

	REFERENCES

[1]	Exam Conduction and Proctoring System Using Face Detection https://www.sciencegate.app/source/724317951
[2]	Online Exam Practical Implications and Future Direction Research Publication https://www.researchgate.net/publication/234153336_Online_Exams_Practical_Implicati ons_and_Future_Directions
[3]	A Study on Web Based Online Examination System https://papers.ssrn.com/sol3/papers.cfm?abstract_id=3611554
[4]	Research and Development of Online Examination System https://www.atlantis-press.com/article/4176.pdf
[5]	Online Examination System https://www.researchgate.net/publication/317306939_Online_Examination_System
