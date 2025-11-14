<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Programs;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CoursesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Courses::class;
    public function definition()
    {
        $program = Programs::inRandomOrder()->first() ?? Programs::factory()->create();
        $courseTitles = [
            'Web Development Bootcamp' => [
                'Full Stack Web Development',
                'Advanced JavaScript & React',
                'Laravel for Beginners',
                'Building APIs with Node.js',
                'Responsive Web Design with HTML & CSS',
                'Vue.js Masterclass',
                'Django Web Development Bootcamp',
                'Next.js for Production Apps',
                'Modern CSS Techniques',
                'Web Performance Optimization',
            ],
            'Data Masterclass' => [
                'Data Science with Python',
                'Big Data Analytics with Spark',
                'Data Visualization with Power BI',
                'Applied Statistics for Data Science',
                'Data Engineering with Apache Airflow',
                'Machine Learning for Data Analysts',
                'SQL for Data Exploration',
                'Data Wrangling with Pandas',
                'Exploratory Data Analysis',
                'Data Ethics and Governance',
            ],
            'Design Fundamentals' => [
                'UI/UX Design Principles',
                'Adobe XD for Beginners',
                'Design Thinking Workshop',
                'Typography and Layout Essentials',
                'Figma for Interface Design',
                'Color Theory in Digital Design',
                'Mobile App UI Design',
                'Wireframing and Prototyping',
                'Accessibility in Design',
                'Visual Storytelling for Designers',
            ],
            'Cybersecurity Essentials' => [
                'Ethical Hacking and Pen Testing',
                'Network Security Basics',
                'Web Application Security',
                'CompTIA Security+ Prep',
                'Cyber Threat Intelligence',
                'Incident Response and Forensics',
                'Cloud Security Fundamentals',
                'Malware Analysis Techniques',
                'Zero Trust Architecture',
                'Security Operations Center Training',
            ],
            'Digital Marketing Strategy' => [
                'SEO and SEM Mastery',
                'Social Media Marketing',
                'Email Campaign Optimization',
                'Google Ads Certification Prep',
                'Content Marketing Strategy',
                'Marketing Analytics with GA4',
                'Influencer Marketing Tactics',
                'Conversion Rate Optimization',
                'Digital Branding Essentials',
                'Affiliate Marketing Fundamentals',
            ],
            'Software Engineering Immersive' => [
                'Object-Oriented Programming in Java',
                'SOLID Principles and Design Patterns',
                'Agile Development with Scrum',
                'Test-Driven Development in PHP',
                'Version Control with Git',
                'Clean Code Practices',
                'Microservices Architecture',
                'Software Testing and QA',
                'Continuous Integration Strategies',
                'Refactoring Legacy Code',
            ],
            'Product Management Accelerator' => [
                'Product Lifecycle Management',
                'Agile Product Ownership',
                'Roadmapping and Prioritization',
                'User Research and MVP Strategy',
                'Metrics-Driven Product Decisions',
                'Stakeholder Communication Skills',
                'Product Discovery Techniques',
                'Go-to-Market Strategy',
                'Competitive Analysis for PMs',
                'Building Product Backlogs',
            ],
            'Cloud Computing & DevOps' => [
                'AWS Solutions Architect',
                'DevOps with Docker & Kubernetes',
                'CI/CD Pipelines with Jenkins',
                'Infrastructure as Code with Terraform',
                'Monitoring with Prometheus & Grafana',
                'Azure DevOps Fundamentals',
                'Serverless Architecture with AWS Lambda',
                'Cloud Cost Optimization',
                'Google Cloud Platform Essentials',
                'Multi-Cloud Deployment Strategies',
            ],
            'Artificial Intelligence & Machine Learning' => [
                'Machine Learning with Scikit-Learn',
                'Deep Learning with TensorFlow',
                'AI for Business Applications',
                'Natural Language Processing Essentials',
                'Computer Vision with OpenCV',
                'Reinforcement Learning Basics',
                'AI Ethics and Fairness',
                'ML Model Deployment with Flask',
                'Time Series Forecasting',
                'Generative AI with Transformers',
            ],
            'Business Analytics & Intelligence' => [
                'Business Intelligence with Tableau',
                'Data-Driven Decision Making',
                'Excel for Business Analytics',
                'Predictive Modeling for Business',
                'Power BI Dashboard Design',
                'KPI Development and Tracking',
                'SQL for Business Analysts',
                'Financial Analytics with Excel',
                'Customer Segmentation Techniques',
                'Data Storytelling for Executives',
            ],
            'Robotics Process Automation' => [
                'RPA with UiPath',
                'RPA with Power Automate Desktop',
                'RPA Strategy and Implementation',
                'Bot Development and Deployment',
                'RPA for Finance Operations',
                'Automation Anywhere Essentials',
                'RPA Governance and Compliance',
                'Intelligent Document Processing',
                'RPA with Python Scripting',
                'Business Process Mapping for RPA',
            ],
            'Database Management Systems' => [
                'SQL for Data Analysis',
                'Database Design and Normalization',
                'PostgreSQL Administration',
                'NoSQL with MongoDB',
                'Relational Database Fundamentals',
                'Stored Procedures and Triggers',
                'Database Performance Tuning',
                'MySQL for Web Applications',
                'Data Modeling with ER Diagrams',
                'Backup and Recovery Strategies',
            ],
        ];
        $courseDetails = [
            'Full Stack Web Development' => [
                'basic_requirements' => '
                    <p>This course is designed for aspiring developers who have a foundational understanding of HTML and CSS. While prior experience with JavaScript is beneficial, it is not mandatory. A strong willingness to learn and engage in hands-on coding is essential.</p>
                    <p>Participants should have access to a computer with internet connectivity and be comfortable navigating basic development tools. Familiarity with any programming language will accelerate progress but is not a strict requirement.</p>
                    <p>No formal prerequisites are required, but a proactive mindset and commitment to completing weekly assignments and collaborative projects will ensure success.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is structured to provide a comprehensive understanding of full-stack web development. It includes:</p>
                    <ol>
                        <li><strong>Frontend Development:</strong> HTML5, CSS3, JavaScript, responsive design, and modern frameworks like React.</li>
                        <li><strong>Backend Development:</strong> Node.js, Express.js, RESTful APIs, and server-side logic.</li>
                        <li><strong>Database Integration:</strong> MongoDB, data modeling, and CRUD operations.</li>
                        <li><strong>Version Control & Deployment:</strong> Git, GitHub, CI/CD pipelines, and deployment to platforms like Vercel or Heroku.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module is designed to build practical skills through structured learning and real-world application:</p>
                    <ul>
                        <li>Weekly coding labs and assignments to reinforce key concepts.</li>
                        <li>Group projects that simulate professional development environments.</li>
                        <li>Interactive quizzes and code reviews to assess comprehension.</li>
                        <li>Capstone project showcasing full-stack proficiency and deployment skills.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>three times a week</strong>, with additional weekend project labs. Each week includes:</p>
                    <ul>
                        <li>Two instructor-led lectures covering theory and demonstrations.</li>
                        <li>One hands-on coding session focused on applying concepts.</li>
                        <li>Optional office hours and peer collaboration sessions.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This immersive program guides learners through the entire web development lifecycle. From crafting responsive user interfaces to building scalable backend services, students gain the skills needed to become proficient full-stack developers.</p>
                    <p>By the end of the course, participants will have built and deployed multiple applications, demonstrating mastery of both frontend and backend technologies.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Develop production-ready web applications using modern technologies.</li>
                        <li>Build a professional portfolio with real-world projects.</li>
                        <li>Gain confidence in collaborative coding environments and version control workflows.</li>
                        <li>Prepare for junior developer roles or freelance opportunities.</li>
                    </ul>
                ',
                'course_technologies' => 'HTML, CSS, JavaScript, React, Node.js, Express, MongoDB, Git',
                'duration' => '12 Weeks',
            ],
            'Data Science with Python' => [
                'basic_requirements' => '
                    <p>This course is tailored for individuals with a foundational understanding of Python programming. Participants should be comfortable with basic syntax, data types, and control structures.</p>
                    <p>While prior exposure to statistics or data analysis is helpful, it is not mandatory. A laptop with Python, Jupyter Notebook, and essential libraries installed is recommended for hands-on practice.</p>
                    <p>Curiosity, analytical thinking, and a commitment to completing weekly exercises and projects are essential for success in this program.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is designed to build a strong foundation in data science using Python. Key modules include:</p>
                    <ol>
                        <li><strong>Data Manipulation:</strong> Working with NumPy arrays and Pandas DataFrames for data cleaning and transformation.</li>
                        <li><strong>Data Visualization:</strong> Creating insightful charts using Matplotlib and Seaborn to explore patterns and trends.</li>
                        <li><strong>Machine Learning:</strong> Implementing supervised and unsupervised models using Scikit-learn, including regression, classification, and clustering.</li>
                        <li><strong>Model Evaluation:</strong> Understanding metrics like accuracy, precision, recall, and ROC curves to assess model performance.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module combines theory with practical application to ensure deep understanding:</p>
                    <ul>
                        <li>Interactive coding sessions using Jupyter Notebooks and real-world datasets.</li>
                        <li>Weekly assignments focused on data wrangling, visualization, and predictive modeling.</li>
                        <li>Peer reviews and instructor feedback to refine analytical approaches.</li>
                        <li>Capstone project involving end-to-end analysis and presentation of insights.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs over <strong>10 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>Two theory sessions covering core concepts and techniques.</li>
                        <li>One lab session focused on hands-on coding and project development.</li>
                        <li>Capstone project begins in week 8 and continues through week 10.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This immersive program introduces learners to the full spectrum of data science workflows. From data acquisition and cleaning to model building and evaluation, students gain practical skills applicable across industries.</p>
                    <p>By the end of the course, participants will be able to independently conduct data analyses, build predictive models, and communicate findings effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master essential Python libraries for data science and machine learning.</li>
                        <li>Build a portfolio of projects showcasing analytical and coding skills.</li>
                        <li>Prepare for roles such as Data Analyst, Machine Learning Engineer, or Business Intelligence Specialist.</li>
                        <li>Gain confidence in working with structured and unstructured data.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, Pandas, NumPy, Matplotlib, Seaborn, Scikit-learn',
                'duration' => '10 Weeks',
            ],
            'UI/UX Design Principles' => [
                'basic_requirements' => '
                    <p>This course is designed for individuals with a passion for creativity and digital design. No prior experience with design software is required, making it ideal for beginners.</p>
                    <p>Participants should have basic computer literacy and an interest in how users interact with digital products. A willingness to explore design thinking and iterate on feedback is essential.</p>
                    <p>Access to a computer with internet connectivity and design tools such as Figma or Adobe XD is recommended for hands-on practice.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is structured to introduce core UI/UX concepts and practical design workflows. Key modules include:</p>
                    <ol>
                        <li><strong>User-Centered Design:</strong> Understanding user needs, personas, and journey mapping.</li>
                        <li><strong>Wireframing & Prototyping:</strong> Creating low-fidelity and high-fidelity prototypes using industry-standard tools.</li>
                        <li><strong>Usability Testing:</strong> Conducting tests, gathering feedback, and refining designs based on user behavior.</li>
                        <li><strong>Design Systems:</strong> Building scalable and consistent design components for real-world applications.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module blends theory with hands-on design practice:</p>
                    <ul>
                        <li>Weekly design challenges focused on real-world scenarios and user problems.</li>
                        <li>Peer critiques and collaborative reviews to foster design communication skills.</li>
                        <li>Case study analysis to understand successful product design strategies.</li>
                        <li>Portfolio development sessions to prepare for job applications and freelance work.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>twice weekly</strong> with structured design critiques every Friday. The schedule includes:</p>
                    <ul>
                        <li>One theory-based lecture covering design principles and frameworks.</li>
                        <li>One practical workshop focused on tool usage and project development.</li>
                        <li>Final portfolio review and presentation in the last week of the course.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This immersive course introduces learners to the principles of user interface and experience design. Through a blend of theory and practice, students will learn to design intuitive, user-friendly digital products.</p>
                    <p>By the end of the program, participants will be able to create wireframes, prototypes, and conduct usability tests to validate their design decisions.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Develop a professional design portfolio with real-world projects.</li>
                        <li>Gain proficiency in leading design tools such as Figma and Adobe XD.</li>
                        <li>Understand user psychology and behavior to inform design choices.</li>
                        <li>Prepare for roles such as UI Designer, UX Researcher, or Product Designer.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Adobe XD, Sketch',
                'duration' => '8 Weeks',
            ],
            'Ethical Hacking and Pen Testing' => [
                'basic_requirements' => '
                    <p>This course is intended for individuals with a foundational understanding of computer networks and operating systems. Prior exposure to TCP/IP protocols, system administration, or basic scripting is advantageous but not mandatory.</p>
                    <p>Participants should be comfortable using command-line interfaces and have access to a computer capable of running virtual machines or penetration testing environments.</p>
                    <p>A strong ethical mindset, curiosity about cybersecurity, and commitment to responsible hacking practices are essential for success in this program.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is designed to simulate real-world penetration testing workflows and includes:</p>
                    <ol>
                        <li><strong>Reconnaissance:</strong> Gathering intelligence using passive and active techniques such as WHOIS, DNS enumeration, and OSINT tools.</li>
                        <li><strong>Scanning & Enumeration:</strong> Identifying open ports, services, and vulnerabilities using tools like Nmap and Nessus.</li>
                        <li><strong>Exploitation:</strong> Gaining access through known vulnerabilities using Metasploit, custom scripts, and manual techniques.</li>
                        <li><strong>Post-Exploitation:</strong> Privilege escalation, maintaining access, and data exfiltration strategies.</li>
                        <li><strong>Reporting:</strong> Documenting findings, writing professional penetration test reports, and presenting remediation strategies.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module combines theoretical instruction with hands-on lab simulations:</p>
                    <ul>
                        <li>Weekly labs using Kali Linux and virtual environments to practice scanning, exploitation, and reporting.</li>
                        <li>Tool walkthroughs and guided exercises to build familiarity with industry-standard frameworks.</li>
                        <li>Peer collaboration on simulated red team/blue team exercises.</li>
                        <li>Final capstone project involving a full penetration test on a mock enterprise network.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>10 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>Two instructor-led sessions covering theory, tool usage, and case studies.</li>
                        <li>Weekend lab sessions focused on applying techniques in sandboxed environments.</li>
                        <li>Final penetration test simulation and report presentation in week 10.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This intensive program equips learners with the skills and mindset required to conduct ethical hacking engagements. From reconnaissance to reporting, students gain hands-on experience in identifying and mitigating security vulnerabilities.</p>
                    <p>By the end of the course, participants will be able to perform structured penetration tests, document findings professionally, and contribute to organizational security posture.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Gain practical experience with tools like Kali Linux, Metasploit, and Nmap.</li>
                        <li>Prepare for certifications such as CEH, OSCP, or CompTIA Pentest+.</li>
                        <li>Build a professional penetration testing portfolio with documented assessments.</li>
                        <li>Understand the ethical and legal frameworks governing cybersecurity practices.</li>
                    </ul>
                ',
                'course_technologies' => 'Kali Linux, Metasploit, Nmap, Burp Suite, Wireshark',
                'duration' => '10 Weeks',
            ],
            'SEO and SEM Mastery' => [
                'basic_requirements' => '
                    <p>This course is designed for marketing professionals, entrepreneurs, and business owners who have a basic understanding of websites and online content. No prior experience with SEO or advertising platforms is required, but familiarity with digital tools will be helpful.</p>
                    <p>Participants should be comfortable using web browsers, managing basic website content (e.g., WordPress or Shopify), and interpreting simple analytics reports. Access to a laptop and internet connection is essential for campaign execution and analysis.</p>
                    <p>A growth mindset, curiosity about digital strategy, and commitment to applying insights to real campaigns will ensure success in this program.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is structured to provide a comprehensive understanding of both organic and paid search strategies. Key modules include:</p>
                    <ol>
                        <li><strong>Keyword Research:</strong> Identifying high-impact keywords using tools like Google Keyword Planner and SEMrush.</li>
                        <li><strong>On-Page SEO:</strong> Optimizing content, meta tags, internal linking, and site structure for search visibility.</li>
                        <li><strong>Link Building:</strong> Developing ethical backlink strategies and outreach campaigns to improve domain authority.</li>
                        <li><strong>Google Ads Setup:</strong> Creating and managing search ad campaigns, setting budgets, and targeting audiences effectively.</li>
                        <li><strong>Performance Analytics:</strong> Using Google Analytics and SEM tools to measure ROI and refine strategy.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module blends strategic planning with hands-on execution:</p>
                    <ul>
                        <li>Live campaign creation and optimization using real business scenarios.</li>
                        <li>SEO audits and competitive analysis to identify growth opportunities.</li>
                        <li>Ad copywriting and A/B testing to improve click-through rates and conversions.</li>
                        <li>Weekly feedback sessions and peer reviews to refine tactics and share insights.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>6 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>One strategy session focused on SEO/SEM theory and case studies.</li>
                        <li>One campaign lab for hands-on implementation and performance tracking.</li>
                        <li>Final audit presentation and campaign review in week 6.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This intensive program equips learners with the skills to drive traffic, generate leads, and increase conversions through search engine optimization and paid advertising. From keyword strategy to campaign execution, students gain a holistic view of digital visibility.</p>
                    <p>By the end of the course, participants will be able to launch and manage SEO/SEM campaigns, interpret performance data, and apply insights to improve marketing outcomes.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Launch and optimize search campaigns using industry-standard tools.</li>
                        <li>Improve website visibility and organic rankings through proven SEO techniques.</li>
                        <li>Measure campaign performance and ROI using analytics platforms.</li>
                        <li>Prepare for roles in digital marketing, performance advertising, or freelance consulting.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Ads, SEMrush, Ahrefs, Google Analytics, Keyword Planner',
                'duration' => '6 Weeks',
            ],
           'Object-Oriented Programming in Java' => [
                'basic_requirements' => '
                    <p>This course is designed for learners with a foundational understanding of programming concepts such as variables, loops, and conditionals. Prior exposure to any programming language (e.g., Python, C++, or JavaScript) will be beneficial.</p>
                    <p>Participants should be comfortable using a code editor or IDE and have basic knowledge of how software is compiled and executed. Access to a computer with Java Development Kit (JDK) and IntelliJ IDEA or Eclipse installed is required.</p>
                    <p>A logical mindset, attention to detail, and willingness to debug and refactor code are essential for mastering object-oriented programming principles.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is structured to provide a deep understanding of object-oriented programming using Java. Key modules include:</p>
                    <ol>
                        <li><strong>Introduction to Java:</strong> Java syntax, data types, control structures, and IDE setup.</li>
                        <li><strong>Core OOP Concepts:</strong> Classes, objects, encapsulation, inheritance, polymorphism, and abstraction.</li>
                        <li><strong>Advanced OOP Techniques:</strong> Interfaces, abstract classes, method overloading/overriding, and exception handling.</li>
                        <li><strong>Design Patterns & Best Practices:</strong> Introduction to SOLID principles, reusable code, and clean architecture.</li>
                        <li><strong>Testing & Debugging:</strong> Unit testing with JUnit, debugging strategies, and code refactoring.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module is designed to reinforce theoretical concepts through practical application:</p>
                    <ul>
                        <li>Hands-on coding labs to implement OOP principles in real-world scenarios.</li>
                        <li>Mini-projects such as building a library system, inventory manager, or student portal.</li>
                        <li>Weekly quizzes and code reviews to assess understanding and improve code quality.</li>
                        <li>Final project involving the design and development of a fully functional Java application.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course spans <strong>9 weeks</strong> and follows a structured weekly schedule:</p>
                    <ul>
                        <li>Two theory sessions covering core concepts and live coding demonstrations.</li>
                        <li>One lab session focused on project development and debugging techniques.</li>
                        <li>Final project review and presentation in week 9, with peer and instructor feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course offers a comprehensive introduction to object-oriented programming using Java. It equips learners with the skills to design modular, maintainable, and scalable software systems.</p>
                    <p>By the end of the program, students will be able to apply OOP principles confidently, write clean and testable Java code, and understand how to structure applications using industry best practices.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master object-oriented programming fundamentals and advanced Java features.</li>
                        <li>Build a portfolio of Java applications demonstrating real-world problem-solving.</li>
                        <li>Gain experience with professional development tools like IntelliJ IDEA and JUnit.</li>
                        <li>Prepare for technical interviews and entry-level software engineering roles.</li>
                    </ul>
                ',
                'course_technologies' => 'Java, IntelliJ IDEA, JUnit, Git',
                'duration' => '9 Weeks',
            ],
            'AWS Solutions Architect' => [
                'basic_requirements' => '
                    <p>This course is intended for IT professionals, developers, and system administrators with a basic understanding of cloud computing concepts. Familiarity with networking, virtualization, and general infrastructure principles will be beneficial.</p>
                    <p>Participants should be comfortable navigating web-based dashboards and command-line interfaces. Prior exposure to AWS services is helpful but not required, as foundational topics will be covered in the early modules.</p>
                    <p>A laptop with internet access and the ability to create an AWS Free Tier account is essential for completing hands-on labs and exercises.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is designed to align with the AWS Certified Solutions Architect – Associate exam and includes:</p>
                    <ol>
                        <li><strong>Cloud Fundamentals:</strong> Overview of AWS global infrastructure, pricing models, and shared responsibility model.</li>
                        <li><strong>Core Services:</strong> Deep dive into EC2, S3, RDS, IAM, and VPC configuration and management.</li>
                        <li><strong>Security & Identity:</strong> Implementing IAM roles, policies, MFA, and encryption best practices.</li>
                        <li><strong>High Availability & Scalability:</strong> Load balancing, auto-scaling, and fault-tolerant architecture design.</li>
                        <li><strong>Infrastructure as Code:</strong> Using CloudFormation to automate resource provisioning and manage stacks.</li>
                        <li><strong>Monitoring & Optimization:</strong> Leveraging CloudWatch, Trusted Advisor, and cost management tools.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module combines theoretical instruction with practical application:</p>
                    <ul>
                        <li>Hands-on labs using the AWS Management Console and AWS CLI to deploy and configure services.</li>
                        <li>Architecture design challenges simulating real-world business scenarios.</li>
                        <li>Weekly quizzes and review sessions to reinforce key concepts and exam readiness.</li>
                        <li>Final capstone project involving the design of a secure, scalable, and cost-effective cloud solution.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>8 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>Two instructor-led lectures covering AWS services, architecture patterns, and exam strategies.</li>
                        <li>One lab session focused on deploying and managing AWS resources.</li>
                        <li>Certification preparation begins in week 6, including mock exams and review workshops.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This intensive program prepares learners for the AWS Solutions Architect certification by providing hands-on experience in designing and deploying cloud infrastructure. Students will gain a deep understanding of AWS services and architectural best practices.</p>
                    <p>By the end of the course, participants will be equipped to build secure, scalable, and resilient cloud solutions and confidently pursue AWS certification.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Gain hands-on experience with core AWS services and architecture design.</li>
                        <li>Prepare for the AWS Solutions Architect – Associate certification exam.</li>
                        <li>Build a portfolio of cloud infrastructure projects demonstrating real-world skills.</li>
                        <li>Enhance career opportunities in cloud engineering, DevOps, and IT architecture roles.</li>
                    </ul>
                ',
                'course_technologies' => 'AWS, CloudFormation, IAM, EC2, S3, VPC, CloudWatch',
                'duration' => '8 Weeks',
            ],

            'Machine Learning with Scikit-Learn' => [
                'basic_requirements' => '
                    <p>This course is designed for learners who have a working knowledge of Python programming and a basic understanding of statistical concepts such as mean, variance, and probability distributions.</p>
                    <p>Participants should be comfortable using Jupyter Notebooks and libraries like NumPy and Pandas for data manipulation. Prior exposure to data analysis or visualization will be helpful but is not mandatory.</p>
                    <p>A laptop with Python installed and access to Scikit-learn, Matplotlib, and Seaborn is required for completing hands-on exercises and projects.</p>
                ',
                'course_outline' => '
                    <p>The curriculum provides a structured introduction to machine learning using Scikit-learn. Key modules include:</p>
                    <ol>
                        <li><strong>Data Preparation:</strong> Loading, cleaning, and preprocessing datasets using Pandas and NumPy.</li>
                        <li><strong>Supervised Learning:</strong> Implementing regression and classification models including Linear Regression, Decision Trees, and Support Vector Machines.</li>
                        <li><strong>Unsupervised Learning:</strong> Applying clustering algorithms such as K-Means and DBSCAN to uncover hidden patterns.</li>
                        <li><strong>Model Evaluation:</strong> Using metrics like accuracy, precision, recall, and ROC curves to assess model performance.</li>
                        <li><strong>Feature Engineering:</strong> Transforming and selecting features to improve model accuracy and generalization.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module combines theoretical instruction with practical implementation:</p>
                    <ul>
                        <li>Hands-on coding exercises using Jupyter Notebooks and real-world datasets.</li>
                        <li>Algorithm tuning and hyperparameter optimization using GridSearchCV and cross-validation.</li>
                        <li>Weekly quizzes and peer-reviewed assignments to reinforce learning outcomes.</li>
                        <li>Final project involving end-to-end model development, evaluation, and deployment.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>7 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>One theory session covering algorithm fundamentals and use cases.</li>
                        <li>One lab session focused on coding implementation and model experimentation.</li>
                        <li>Final model deployment and project presentation in week 7.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This program introduces learners to the core principles of machine learning using Python and Scikit-learn. Through a blend of theory and hands-on practice, students will learn to build, evaluate, and optimize predictive models.</p>
                    <p>By the end of the course, participants will be able to apply machine learning techniques to real-world datasets and communicate insights effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Gain practical experience with supervised and unsupervised learning algorithms.</li>
                        <li>Build a portfolio of machine learning projects using Scikit-learn and Python.</li>
                        <li>Develop skills in data preprocessing, model evaluation, and feature engineering.</li>
                        <li>Prepare for roles in data science, machine learning engineering, or AI research.</li>
                    </ul>
                ',
                'course_technologies' => 'Scikit-learn, Pandas, NumPy, Matplotlib, Seaborn',
                'duration' => '7 Weeks',
            ],
            'Business Intelligence with Tableau' => [
                'basic_requirements' => '
                    <p>This course is ideal for professionals with basic knowledge of Excel or spreadsheet tools. No prior experience with Tableau is required, making it accessible to beginners in data visualization.</p>
                    <p>Participants should be comfortable working with structured data and interpreting charts or tables. Familiarity with business metrics and reporting workflows will enhance the learning experience.</p>
                    <p>A laptop with Tableau Desktop installed and access to sample datasets is recommended for completing hands-on exercises and dashboard projects.</p>
                ',
                'course_outline' => '
                    <p>The curriculum is designed to build proficiency in Tableau for business intelligence and data storytelling. Key modules include:</p>
                    <ol>
                        <li><strong>Data Connections:</strong> Connecting to Excel, SQL databases, and cloud sources for importing data.</li>
                        <li><strong>Dashboard Creation:</strong> Designing interactive dashboards with filters, parameters, and visual best practices.</li>
                        <li><strong>Calculated Fields:</strong> Creating custom metrics and KPIs using Tableau’s formula editor.</li>
                        <li><strong>Data Aggregation & Filtering:</strong> Applying filters, groups, and hierarchies to analyze trends and patterns.</li>
                        <li><strong>Storytelling & Presentation:</strong> Building storyboards and presenting insights to stakeholders.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module combines technical instruction with real-world business scenarios:</p>
                    <ul>
                        <li>Interactive Tableau labs focused on building dashboards and visualizations.</li>
                        <li>Case studies from marketing, finance, and operations to apply BI techniques.</li>
                        <li>Peer reviews and instructor feedback to refine dashboard design and usability.</li>
                        <li>Final presentation of a business case dashboard to demonstrate mastery.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>6 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>Two sessions per week: one lecture and one lab.</li>
                        <li>Dashboard review and critique sessions in weeks 3 and 5.</li>
                        <li>Final dashboard presentation and evaluation in week 6.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This program empowers learners to transform raw data into actionable insights using Tableau. Students will gain the skills to build interactive dashboards, perform data analysis, and communicate findings effectively.</p>
                    <p>By the end of the course, participants will be able to create professional-grade dashboards tailored to business needs and decision-making processes.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master Tableau for data visualization and business intelligence reporting.</li>
                        <li>Build dashboards that communicate insights clearly and effectively.</li>
                        <li>Apply BI techniques to real-world business scenarios and datasets.</li>
                        <li>Prepare for roles in data analytics, business intelligence, and reporting.</li>
                    </ul>
                ',
                'course_technologies' => 'Tableau, Excel, SQL',
                'duration' => '6 Weeks',
            ],
            'RPA with UiPath' => [
                'basic_requirements' => '
                    <p>This course is designed for professionals who understand basic business processes and are comfortable using Windows applications. No prior experience with automation tools is required.</p>
                    <p>Participants should be familiar with workflows such as data entry, file handling, and email communication. A logical mindset and attention to detail are essential for designing effective automation solutions.</p>
                    <p>A laptop with UiPath Studio installed and access to sample business scenarios is recommended for completing bot development exercises.</p>
                ',
                'course_outline' => '
                    <p>The curriculum introduces robotic process automation using UiPath and covers the following modules:</p>
                    <ol>
                        <li><strong>UiPath Studio Basics:</strong> Navigating the interface, creating sequences, and managing projects.</li>
                        <li><strong>Selectors & Workflows:</strong> Understanding UI elements, building robust selectors, and designing flowcharts.</li>
                        <li><strong>Data Scraping & Manipulation:</strong> Extracting structured data from web pages and documents.</li>
                        <li><strong>Automation Deployment:</strong> Publishing bots, scheduling tasks, and monitoring performance.</li>
                        <li><strong>Enterprise Use Cases:</strong> Applying RPA to finance, HR, and customer service processes.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module includes guided exercises and real-world automation challenges:</p>
                    <ul>
                        <li>Step-by-step bot creation using UiPath Studio and sample workflows.</li>
                        <li>Debugging and error handling to ensure reliability and scalability.</li>
                        <li>Peer collaboration on automation design and testing.</li>
                        <li>Final project involving the development and deployment of a complete automation solution.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>5 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>One theory session covering automation concepts and best practices.</li>
                        <li>One lab session focused on bot development and testing.</li>
                        <li>Final bot deployment and presentation in week 5.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This hands-on program introduces learners to robotic process automation using UiPath. Students will learn to automate repetitive tasks, improve operational efficiency, and integrate bots into enterprise workflows.</p>
                    <p>By the end of the course, participants will be able to design, build, and deploy software robots for a variety of business use cases.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Gain practical experience with UiPath Studio and automation design.</li>
                        <li>Automate repetitive tasks to improve productivity and reduce errors.</li>
                        <li>Build a portfolio of bots demonstrating real-world business applications.</li>
                        <li>Prepare for roles in RPA development, business process automation, and digital transformation.</li>
                    </ul>
                ',
                'course_technologies' => 'UiPath, Excel, Power Automate',
                'duration' => '5 Weeks',
            ],
            'RPA with Power Automate Desktop' => [
                'basic_requirements' => '
                    <p>This course is designed for professionals who are familiar with basic business workflows and have experience using Windows-based applications. No prior programming or automation experience is required.</p>
                    <p>Participants should be comfortable navigating file systems, working with Excel, and using web browsers. A Microsoft account and access to Power Automate Desktop are required for hands-on practice.</p>
                    <p>Attention to detail, logical thinking, and a desire to streamline repetitive tasks will help learners succeed in this course.</p>
                ',
                'course_outline' => '
                    <p>The curriculum introduces robotic process automation using Microsoft Power Automate Desktop. Key modules include:</p>
                    <ol>
                        <li><strong>Getting Started:</strong> Installing Power Automate Desktop, understanding the interface, and creating your first flow.</li>
                        <li><strong>UI Automation:</strong> Automating desktop applications, mouse clicks, keyboard inputs, and screen scraping.</li>
                        <li><strong>Data Handling:</strong> Working with variables, loops, conditions, and Excel automation.</li>
                        <li><strong>Web Automation:</strong> Automating browser tasks, form submissions, and data extraction from websites.</li>
                        <li><strong>Error Handling & Deployment:</strong> Implementing exception handling, debugging flows, and deploying bots in production environments.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Each module blends theory with hands-on bot development:</p>
                    <ul>
                        <li>Step-by-step labs to build and test automation flows using real-world business scenarios.</li>
                        <li>Weekly challenges to reinforce logic building, data manipulation, and UI interaction.</li>
                        <li>Peer collaboration and feedback on automation design and efficiency.</li>
                        <li>Final project involving the development of a complete end-to-end automation solution.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>The course runs for <strong>5 weeks</strong> with the following weekly structure:</p>
                    <ul>
                        <li>One theory session introducing automation concepts and Power Automate Desktop features.</li>
                        <li>One lab session focused on building and testing flows.</li>
                        <li>Final bot deployment and presentation in week 5.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This hands-on course introduces learners to robotic process automation using Microsoft Power Automate Desktop. Students will learn to automate repetitive desktop and web tasks, improving efficiency and reducing manual errors.</p>
                    <p>By the end of the course, participants will be able to design, build, and deploy automation flows that streamline business operations and enhance productivity.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Gain practical experience with Power Automate Desktop and RPA design principles.</li>
                        <li>Automate repetitive tasks across desktop and web applications without writing code.</li>
                        <li>Build a portfolio of automation flows applicable to real business use cases.</li>
                        <li>Prepare for roles in digital transformation, automation strategy, and business process optimization.</li>
                    </ul>
                ',
                'course_technologies' => 'Power Automate Desktop, Excel, Windows UI Automation',
                'duration' => '5 Weeks',
            ],
        ];

        $programName = $program->program_name;
        $courseName = $courseTitles[$programName][array_rand($courseTitles[$programName])];

        // Safely return course data only if details exist
        if (\App\Models\Courses::where('course_name', $courseName)->doesntExist()) {

            if (isset($courseDetails[$courseName])) {
                return [
                    'slug' => RandomString(9),
                    'course_name' => $courseName,
                    'banner' => 'els.png',
                    'user_id' => 1,
                    'programSlug' => $program->slug,
                    'basic_requirements' => $courseDetails[$courseName]['basic_requirements'],
                    'course_outline' => $courseDetails[$courseName]['course_outline'],
                    'learning_module' => $courseDetails[$courseName]['learning_module'],
                    'course_schedule' => $courseDetails[$courseName]['course_schedule'],
                    'course_overview' => $courseDetails[$courseName]['course_overview'],
                    'benefits' => $courseDetails[$courseName]['benefits'],
                    'course_technologies' => json_encode($courseDetails[$courseName]['course_technologies']),
                    'duration' => $courseDetails[$courseName]['duration'],
                ];
            }

            // Fallback if course details are missing
            return [
                'slug' => RandomString(9),
                'course_name' => $courseName,
                'banner' => 'els.png',
                'user_id' => 1,
                'programSlug' => $program->slug,
                'basic_requirements' => $this->faker->paragraph(),
                'course_outline' => $this->faker->paragraph(),
                'learning_module' => $this->faker->paragraph(),
                'course_schedule' => $this->faker->paragraph(),
                'course_overview' => $this->faker->paragraph(),
                'packages_included' => $this->faker->sentence(),
                'benefits' => $this->faker->paragraph(),
                'course_technologies' => json_encode($this->faker->words(10, true)),
                'duration' => '4 Weeks',
                'training_type' => $this->faker->word(),
                'payment_structure' => $this->faker->paragraph(),

            ];
        }
        // $programName = $program->program_name;
        // $courseName = $courseTitles[$programName][array_rand($courseTitles[$programName])];

        // if (isset($courseDetails[$courseName])) {
        //     return [
        //         'course_name' => $courseName,
        //         'banner' => 'els.png',
        //         'user_id' => 1,
        //         'programSlug' => $program->slug,
        //         'basic_requirements' => $courseDetails[$courseName]['basic_requirements'],
        //         'course_outline' => $courseDetails[$courseName]['course_outline'],
        //         'learning_module' => $courseDetails[$courseName]['learning_module'],
        //         'course_schedule' => $courseDetails[$courseName]['course_schedule'],
        //         'course_overview' => $courseDetails[$courseName]['course_overview'],
        //         'benefits' => $courseDetails[$courseName]['benefits'],
        //         'course_technologies' => $courseDetails[$courseName]['course_technologies'],
        //         'duration' => $courseDetails[$courseName]['duration'],
        //     ];
        // }

        // return [
        //     'slug' => Str::random(12),
        //     'course_name' => $courseName,
        //     'banner' => 'els.png',
        //     'user_id' => 1,
        //     'programSlug' => $program->slug,
        //     'basic_requirements' => $courseDetails[$courseName]['basic_requirements'] ?? $this->faker->paragraph(),
        //     'course_outline' => $courseDetails[$courseName]['course_outline'] ?? $this->faker->paragraph(),
        //     'learning_module' => $courseDetails[$courseName]['learning_module'] ?? $this->faker->paragraph(),
        //     'course_schedule' => $courseDetails[$courseName]['course_schedule'] ?? "Weekly sessions with hands-on labs and project milestones.",
        //     'course_overview' => $courseDetails[$courseName]['course_overview'] ?? "This course provides a structured path to mastering core skills in the selected domain.",
        //     'benefits' => $courseDetails[$courseName]['benefits'] ?? "Gain practical experience, build a portfolio, and prepare for industry roles.",
        //     'course_technologies' => $courseDetails[$courseName]['course_technologies'] ?? implode(', ', $this->faker->words(3)),
        //     'duration' => $courseDetails[$courseName]['duration'] ?? "6 Weeks",

        //     'training_type' => $this->faker->word(),
        //     'payment_structure' => $this->faker->paragraph(),
        //     'packages_included' => $this->faker->sentence(),
           
        //     'ratings' => 5,
            
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ];
    }

}
