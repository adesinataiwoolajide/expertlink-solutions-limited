<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\{Programs, Courses};
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
                'Python for Data Analysis',
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
            'Big Data Analytics with Spark' => [
                'basic_requirements' => '
                    <p>Participants should have intermediate programming skills and a basic understanding of data processing. Prior experience with Python or Java is recommended.</p>
                    <p>A laptop with Apache Spark installed or access to cloud-based Spark environments is required.</p>
                    <p>This course is ideal for data engineers, analysts, and developers working with large-scale datasets.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on big data processing and analytics using Apache Spark:</p>
                    <ol>
                        <li><strong>Spark Fundamentals:</strong> Architecture, RDDs, and DataFrames.</li>
                        <li><strong>Data Processing:</strong> Transformations, actions, and optimization techniques.</li>
                        <li><strong>Streaming & MLlib:</strong> Real-time data and machine learning pipelines.</li>
                        <li><strong>Integration:</strong> Working with Hadoop, Hive, and cloud platforms.</li>
                        <li><strong>Project Work:</strong> Analyze large datasets and build scalable data pipelines.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build scalable data processing skills:</p>
                    <ul>
                        <li>Hands-on labs with Spark transformations and queries.</li>
                        <li>Weekly assignments focused on performance and scalability.</li>
                        <li>Group projects simulating enterprise data workflows.</li>
                        <li>Capstone project: Build and deploy a Spark-based analytics solution.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Spark architecture and use cases.</li>
                        <li>One lab session for coding and data pipeline development.</li>
                        <li>Optional cloud lab access and mentoring sessions.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners process and analyze massive datasets using Apache Spark. It emphasizes performance, scalability, and real-time analytics.</p>
                    <p>By the end, students will be able to build robust data pipelines and extract insights from big data.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn to process big data efficiently using Spark.</li>
                        <li>Build scalable analytics pipelines and dashboards.</li>
                        <li>Prepare for data engineering and analytics roles.</li>
                        <li>Gain experience with distributed computing and cloud integration.</li>
                    </ul>
                ',
                'course_technologies' => 'Apache Spark, Hadoop, Hive, MLlib, Python, Java, AWS',
                'duration' => '8 Weeks',
            ],
            'Data Visualization with Power BI' => [
                'basic_requirements' => '
                    <p>No prior coding experience is required. Participants should be comfortable working with spreadsheets and basic data concepts.</p>
                    <p>A Windows-based computer with Power BI Desktop installed is recommended.</p>
                    <p>This course is ideal for business professionals, analysts, and managers seeking to visualize and interpret data.</p>
                ',
                'course_outline' => '
                    <p>The course covers data visualization and dashboard creation using Power BI:</p>
                    <ol>
                        <li><strong>Power BI Basics:</strong> Interface, data import, and transformation.</li>
                        <li><strong>Data Modeling:</strong> Relationships, calculated columns, and DAX formulas.</li>
                        <li><strong>Visualizations:</strong> Charts, maps, slicers, and custom visuals.</li>
                        <li><strong>Dashboard Design:</strong> Layout, interactivity, and storytelling.</li>
                        <li><strong>Publishing & Sharing:</strong> Power BI Service, workspaces, and collaboration.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build visualization and reporting skills:</p>
                    <ul>
                        <li>Weekly dashboard challenges and design critiques.</li>
                        <li>Mini-projects focused on business scenarios.</li>
                        <li>Interactive quizzes and peer feedback.</li>
                        <li>Capstone project: Build and publish a business intelligence dashboard.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Power BI features and demos.</li>
                        <li>One hands-on session for dashboard creation and data modeling.</li>
                        <li>Optional office hours and visualization reviews.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course empowers learners to create impactful data visualizations and dashboards using Power BI. It emphasizes clarity, interactivity, and business relevance.</p>
                    <p>By the end, students will be able to communicate insights effectively through professional dashboards.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master Power BI for data visualization and reporting.</li>
                        <li>Build interactive dashboards for business decision-making.</li>
                        <li>Prepare for analyst roles and data-driven presentations.</li>
                        <li>Gain experience with DAX and Power BI Service.</li>
                    </ul>
                ',
                'course_technologies' => 'Power BI, DAX, Excel, Power Query',
                'duration' => '6 Weeks',
            ],
            'Applied Statistics for Data Science' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of mathematics and familiarity with spreadsheets or programming tools. Prior exposure to Python or R is helpful but not required.</p>
                    <p>A laptop with access to statistical software or Jupyter Notebook is recommended.</p>
                    <p>This course is ideal for analysts, researchers, and aspiring data scientists looking to strengthen their statistical foundation.</p>
                ',
                'course_outline' => '
                    <p>The course covers statistical methods used in modern data science:</p>
                    <ol>
                        <li><strong>Descriptive Statistics:</strong> Measures of central tendency, dispersion, and data visualization.</li>
                        <li><strong>Probability Theory:</strong> Distributions, sampling, and the law of large numbers.</li>
                        <li><strong>Inferential Statistics:</strong> Hypothesis testing, confidence intervals, and p-values.</li>
                        <li><strong>Regression Analysis:</strong> Linear and logistic regression models.</li>
                        <li><strong>Applications:</strong> Case studies in A/B testing, forecasting, and risk analysis.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build statistical thinking and application skills:</p>
                    <ul>
                        <li>Weekly problem sets and data interpretation exercises.</li>
                        <li>Mini-projects using real-world datasets.</li>
                        <li>Peer discussions and statistical critique sessions.</li>
                        <li>Capstone project: Analyze and report on a business or scientific dataset.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering statistical theory and examples.</li>
                        <li>One lab session for hands-on analysis and interpretation.</li>
                        <li>Optional office hours for project support and Q&A.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course provides a practical introduction to statistics for data science. It emphasizes interpretation, critical thinking, and real-world application of statistical methods.</p>
                    <p>By the end, students will be able to apply statistical reasoning to data-driven problems.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Build a strong foundation in applied statistics.</li>
                        <li>Learn to interpret and communicate statistical results.</li>
                        <li>Prepare for advanced analytics and machine learning courses.</li>
                        <li>Gain confidence in data-driven decision-making.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, R, Excel, Jupyter, SciPy, StatsModels',
                'duration' => '8 Weeks',
            ],
            'Data Engineering with Apache Airflow' => [
                'basic_requirements' => '
                    <p>Participants should have intermediate Python skills and a basic understanding of data pipelines and ETL concepts. Familiarity with SQL and cloud platforms is helpful.</p>
                    <p>A development environment with Python and Airflow installed or access to a cloud-based workspace is required.</p>
                    <p>This course is ideal for data engineers and developers building automated data workflows.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on building and orchestrating data pipelines using Apache Airflow:</p>
                    <ol>
                        <li><strong>Airflow Basics:</strong> DAGs, tasks, scheduling, and operators.</li>
                        <li><strong>Workflow Design:</strong> Dependencies, retries, and parallel execution.</li>
                        <li><strong>Data Integration:</strong> Connecting to databases, APIs, and cloud storage.</li>
                        <li><strong>Monitoring & Logging:</strong> Alerts, logs, and performance tracking.</li>
                        <li><strong>Deployment:</strong> Running Airflow in production environments (Docker, Kubernetes, Cloud Composer).</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build automation and orchestration skills:</p>
                    <ul>
                        <li>Hands-on labs for building and debugging DAGs.</li>
                        <li>Weekly challenges focused on real-world data workflows.</li>
                        <li>Peer reviews and code optimization sessions.</li>
                        <li>Capstone project: Design and deploy a production-grade data pipeline.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Airflow concepts and architecture.</li>
                        <li>One lab session for building and testing workflows.</li>
                        <li>Optional mentoring sessions for deployment support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to automate and manage complex data workflows using Apache Airflow. It emphasizes modular design, scalability, and production readiness.</p>
                    <p>By the end, students will be able to build robust, maintainable data pipelines for enterprise use.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master Apache Airflow for data orchestration.</li>
                        <li>Build scalable and maintainable ETL pipelines.</li>
                        <li>Prepare for data engineering and DevOps roles.</li>
                        <li>Gain experience with cloud deployment and monitoring tools.</li>
                    </ul>
                ',
                'course_technologies' => 'Apache Airflow, Python, SQL, Docker, GCP, AWS, PostgreSQL',
                'duration' => '9 Weeks',
            ],
            'Machine Learning for Data Analysts' => [
                'basic_requirements' => '
                    <p>Participants should have experience with data analysis and a working knowledge of Python. Familiarity with statistics and linear algebra is helpful but not required.</p>
                    <p>A laptop with Python, pandas, and scikit-learn installed is essential.</p>
                    <p>This course is ideal for analysts looking to transition into machine learning roles.</p>
                ',
                'course_outline' => '
                    <p>The course introduces machine learning concepts and tools for data analysts:</p>
                    <ol>
                        <li><strong>Supervised Learning:</strong> Regression, classification, and model evaluation.</li>
                        <li><strong>Unsupervised Learning:</strong> Clustering, dimensionality reduction, and anomaly detection.</li>
                        <li><strong>Model Tuning:</strong> Cross-validation, hyperparameter optimization, and pipelines.</li>
                        <li><strong>Interpretability:</strong> Feature importance, SHAP values, and model transparency.</li>
                        <li><strong>Deployment:</strong> Saving models, APIs, and basic deployment strategies.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build practical machine learning skills:</p>
                    <ul>
                        <li>Hands-on labs with real datasets and modeling tasks.</li>
                        <li>Weekly assignments focused on prediction and evaluation.</li>
                        <li>Peer reviews and model comparison sessions.</li>
                        <li>Capstone project: Build and present a machine learning solution to a business problem.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>three times a week</strong>:</p>
                    <ul>
                        <li>Two lectures covering ML theory and case studies.</li>
                        <li>One lab session for model building and evaluation.</li>
                        <li>Optional office hours and project mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course bridges the gap between data analysis and machine learning. It emphasizes practical modeling, evaluation, and communication of results.</p>
                    <p>By the end, students will be able to build and interpret machine learning models confidently.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn machine learning with a focus on real-world application.</li>
                        <li>Build predictive models and evaluate performance.</li>
                        <li>Prepare for data scientist and ML analyst roles.</li>
                        <li>Gain experience with scikit-learn and model deployment basics.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, pandas, scikit-learn, NumPy, Matplotlib, Jupyter',
                'duration' => '10 Weeks',
            ],
            'SQL for Data Exploration' => [
                'basic_requirements' => '
                    <p>No prior programming experience is required. Participants should be comfortable with basic computer operations and spreadsheets.</p>
                    <p>A laptop with access to a SQL environment such as MySQL, PostgreSQL, or SQLite is recommended.</p>
                    <p>This course is ideal for beginners, analysts, and professionals seeking to query and analyze structured data.</p>
                ',
                'course_outline' => '
                    <p>The course introduces SQL for data querying and exploration:</p>
                    <ol>
                        <li><strong>SQL Basics:</strong> SELECT statements, filtering, sorting, and aliases.</li>
                        <li><strong>Joins & Aggregations:</strong> INNER, LEFT, RIGHT joins, GROUP BY, and aggregate functions.</li>
                        <li><strong>Subqueries & CTEs:</strong> Nested queries and common table expressions.</li>
                        <li><strong>Data Cleaning:</strong> Handling NULLs, formatting, and transformation techniques.</li>
                        <li><strong>Real-World Scenarios:</strong> Business case studies and performance optimization.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build querying and analytical skills:</p>
                    <ul>
                        <li>Weekly query challenges and data puzzles.</li>
                        <li>Mini-projects using sample databases.</li>
                        <li>Peer reviews and query optimization sessions.</li>
                        <li>Capstone project: Analyze a dataset and present insights using SQL.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering SQL syntax and examples.</li>
                        <li>One lab session for writing and testing queries.</li>
                        <li>Optional office hours and database walkthroughs.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners explore and analyze data using SQL. It emphasizes practical querying techniques and real-world applications.</p>
                    <p>By the end, students will be able to write efficient SQL queries and extract meaningful insights from structured data.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn SQL from the ground up with hands-on practice.</li>
                        <li>Analyze and interpret data using queries.</li>
                        <li>Prepare for analyst and data support roles.</li>
                        <li>Build a foundation for advanced data engineering and BI tools.</li>
                    </ul>
                ',
                'course_technologies' => 'SQL, MySQL, PostgreSQL, SQLite, DB Browser',
                'duration' => '6 Weeks',
            ],

            'Data Wrangling with Pandas' => [
                'basic_requirements' => '
                    <p>Participants should have basic Python knowledge and familiarity with data formats like CSV and Excel.</p>
                    <p>A laptop with Python and pandas installed or access to Jupyter Notebook is essential.</p>
                    <p>This course is ideal for analysts and data scientists working with messy or unstructured data.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on cleaning and transforming data using pandas:</p>
                    <ol>
                        <li><strong>Data Loading:</strong> Reading CSV, Excel, and JSON files.</li>
                        <li><strong>Data Cleaning:</strong> Handling missing values, duplicates, and inconsistent formats.</li>
                        <li><strong>Transformation:</strong> Filtering, grouping, reshaping, and merging datasets.</li>
                        <li><strong>Feature Engineering:</strong> Creating new columns, encoding, and scaling.</li>
                        <li><strong>Project Work:</strong> Wrangle real-world datasets for analysis and modeling.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build data preparation skills:</p>
                    <ul>
                        <li>Weekly wrangling exercises and data challenges.</li>
                        <li>Mini-projects focused on cleaning and transforming datasets.</li>
                        <li>Peer reviews and code optimization sessions.</li>
                        <li>Capstone project: Prepare a messy dataset for machine learning or reporting.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering pandas techniques and demos.</li>
                        <li>One lab session for hands-on data wrangling.</li>
                        <li>Optional office hours for project support and Q&A.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to clean, transform, and prepare data using pandas. It emphasizes efficiency, reproducibility, and readiness for analysis.</p>
                    <p>By the end, students will be able to wrangle complex datasets and streamline data workflows.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master data wrangling with pandas.</li>
                        <li>Prepare datasets for analysis and modeling.</li>
                        <li>Improve data quality and workflow efficiency.</li>
                        <li>Prepare for data analyst and data scientist roles.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, pandas, NumPy, Jupyter, CSV, Excel',
                'duration' => '7 Weeks',
            ],
            'Exploratory Data Analysis' => [
                'basic_requirements' => '
                    <p>Participants should have basic Python skills and familiarity with data formats like CSV and Excel. Prior exposure to pandas or matplotlib is helpful.</p>
                    <p>A laptop with Python and Jupyter Notebook installed is recommended.</p>
                    <p>This course is ideal for analysts and data scientists seeking to uncover patterns and insights in data.</p>
                ',
                'course_outline' => '
                    <p>The course covers techniques for exploring and understanding datasets:</p>
                    <ol>
                        <li><strong>Data Profiling:</strong> Summary statistics, distributions, and missing value analysis.</li>
                        <li><strong>Visualization:</strong> Histograms, box plots, scatter plots, and correlation matrices.</li>
                        <li><strong>Feature Relationships:</strong> Grouping, pivoting, and trend analysis.</li>
                        <li><strong>Outlier Detection:</strong> Z-scores, IQR, and visual inspection.</li>
                        <li><strong>Project Work:</strong> Perform EDA on a real-world dataset and present findings.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build data exploration and storytelling skills:</p>
                    <ul>
                        <li>Weekly EDA challenges and visualizations.</li>
                        <li>Mini-projects focused on uncovering insights.</li>
                        <li>Peer reviews and presentation sessions.</li>
                        <li>Capstone project: Conduct and present a full EDA on a complex dataset.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering EDA techniques and examples.</li>
                        <li>One lab session for hands-on exploration and visualization.</li>
                        <li>Optional office hours for feedback and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to explore and interpret datasets using statistical and visual techniques. It emphasizes curiosity, clarity, and actionable insights.</p>
                    <p>By the end, students will be able to perform thorough EDA and communicate findings effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn to explore and visualize data effectively.</li>
                        <li>Uncover patterns, trends, and anomalies.</li>
                        <li>Prepare for data analysis and reporting roles.</li>
                        <li>Build a portfolio of EDA projects and presentations.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, pandas, matplotlib, seaborn, Jupyter',
                'duration' => '6 Weeks',
            ],
            'Data Ethics and Governance' => [
                'basic_requirements' => '
                    <p>No technical background is required. This course is open to professionals, analysts, and decision-makers interested in responsible data practices.</p>
                    <p>Participants should have a general understanding of how data is collected and used in organizations.</p>
                    <p>This course is ideal for those involved in data strategy, compliance, or policy-making.</p>
                ',
                'course_outline' => '
                    <p>The course explores ethical and governance frameworks for data use:</p>
                    <ol>
                        <li><strong>Foundations of Data Ethics:</strong> Privacy, consent, and ethical dilemmas in data collection and use.</li>
                        <li><strong>Regulatory Landscape:</strong> GDPR, CCPA, and global data protection laws.</li>
                        <li><strong>Bias & Fairness:</strong> Identifying and mitigating algorithmic bias and discrimination.</li>
                        <li><strong>Data Governance Principles:</strong> Stewardship, accountability, and data quality management.</li>
                        <li><strong>Organizational Implementation:</strong> Policies, roles, and tools for ethical data governance.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build awareness and strategic thinking:</p>
                    <ul>
                        <li>Case studies on ethical failures and best practices.</li>
                        <li>Group discussions and policy drafting exercises.</li>
                        <li>Interactive quizzes on legal and ethical scenarios.</li>
                        <li>Capstone project: Design a data ethics and governance framework for a fictional organization.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once a week</strong> with optional discussion forums:</p>
                    <ul>
                        <li>One seminar-style session covering theory and real-world examples.</li>
                        <li>Optional breakout groups for collaborative policy design.</li>
                        <li>Guest lectures from industry experts and legal professionals.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course equips learners with the knowledge to navigate ethical challenges and implement governance structures in data-driven environments. It emphasizes transparency, accountability, and fairness.</p>
                    <p>By the end, students will be able to advocate for responsible data practices and contribute to ethical data cultures.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand the ethical and legal dimensions of data use.</li>
                        <li>Develop governance strategies for data protection and compliance.</li>
                        <li>Prepare for roles in data policy, compliance, and risk management.</li>
                        <li>Gain insights into emerging trends in AI ethics and data responsibility.</li>
                    </ul>
                ',
                'course_technologies' => 'GDPR, CCPA, Data Catalogs, Risk Frameworks, Policy Templates',
                'duration' => '5 Weeks',
            ],
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
            'Laravel for Beginners' => [
                'basic_requirements' => '
                    <p>This course is ideal for developers who have a basic understanding of PHP and web development fundamentals. Familiarity with HTML, CSS, and relational databases will be helpful but not mandatory.</p>
                    <p>Participants should have a local development environment set up with PHP, Composer, and a code editor. Access to MySQL or a similar database system is recommended.</p>
                    <p>No prior experience with Laravel is required. A willingness to learn and experiment with MVC architecture will ensure success.</p>
                ',
                'course_outline' => '
                    <p>The course introduces Laravel’s core features and guides learners through building web applications:</p>
                    <ol>
                        <li><strong>Introduction to Laravel:</strong> Installation, folder structure, and routing basics.</li>
                        <li><strong>Blade Templating:</strong> Views, layouts, and dynamic content rendering.</li>
                        <li><strong>Controllers & Models:</strong> MVC architecture, data flow, and CRUD operations.</li>
                        <li><strong>Database Integration:</strong> Migrations, Eloquent ORM, and relationships.</li>
                        <li><strong>Authentication & Middleware:</strong> User login, access control, and route protection.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build hands-on experience with Laravel:</p>
                    <ul>
                        <li>Weekly coding exercises and mini-projects.</li>
                        <li>Step-by-step tutorials for building a blog or task manager.</li>
                        <li>Code reviews and debugging sessions.</li>
                        <li>Capstone project: Deploy a Laravel application with authentication and CRUD features.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice a week</strong> with optional weekend labs:</p>
                    <ul>
                        <li>One lecture session covering Laravel concepts and demos.</li>
                        <li>One practical session focused on building features.</li>
                        <li>Office hours for personalized support and Q&A.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This beginner-friendly course helps learners build dynamic web applications using Laravel. It emphasizes clean code, MVC architecture, and rapid development techniques.</p>
                    <p>By the end, students will be able to create and deploy functional Laravel apps with user authentication and database integration.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn Laravel from the ground up with practical examples.</li>
                        <li>Build and deploy your own PHP-based web applications.</li>
                        <li>Understand MVC architecture and RESTful routing.</li>
                        <li>Prepare for backend developer roles or freelance Laravel projects.</li>
                    </ul>
                ',
                'course_technologies' => 'PHP, Laravel, MySQL, Blade, Composer, Git',
                'duration' => '8 Weeks',
            ],
            'Building APIs with Node.js' => [
                'basic_requirements' => '
                    <p>Participants should have a working knowledge of JavaScript and basic web development concepts. Familiarity with HTTP, JSON, and REST principles is helpful but not required.</p>
                    <p>A development environment with Node.js and a code editor installed is essential. Prior experience with Express.js is a plus but not mandatory.</p>
                    <p>This course is ideal for those looking to build backend services and APIs for web and mobile applications.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on designing and building RESTful APIs using Node.js:</p>
                    <ol>
                        <li><strong>Node.js Fundamentals:</strong> Modules, event-driven architecture, and asynchronous programming.</li>
                        <li><strong>Express.js Framework:</strong> Routing, middleware, and request handling.</li>
                        <li><strong>Database Integration:</strong> MongoDB and Mongoose for data persistence.</li>
                        <li><strong>Authentication & Security:</strong> JWT, OAuth, and securing endpoints.</li>
                        <li><strong>Testing & Deployment:</strong> Postman, unit testing, and deploying APIs to cloud platforms.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build backend development skills:</p>
                    <ul>
                        <li>Hands-on labs for creating and testing APIs.</li>
                        <li>Weekly challenges focused on CRUD operations and authentication.</li>
                        <li>Peer reviews and debugging exercises.</li>
                        <li>Capstone project: Build and deploy a secure API for a real-world use case.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong> with optional weekend labs:</p>
                    <ul>
                        <li>One lecture session covering backend concepts and demos.</li>
                        <li>One practical session focused on API development.</li>
                        <li>Office hours for personalized support and Q&A.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course equips learners with the skills to build scalable and secure APIs using Node.js. It emphasizes modular design, data handling, and deployment strategies.</p>
                    <p>By the end, students will be able to create production-ready APIs for web and mobile applications.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master backend development with Node.js and Express.</li>
                        <li>Build and deploy secure RESTful APIs.</li>
                        <li>Understand authentication, middleware, and error handling.</li>
                        <li>Prepare for backend developer roles and freelance API projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Node.js, Express, MongoDB, Mongoose, JWT, Postman, Git',
                'duration' => '10 Weeks',
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
            'Adobe XD for Beginners' => [
                'basic_requirements' => '
                    <p>No prior design experience is required. Participants should be comfortable using a computer and navigating software interfaces.</p>
                    <p>A laptop with Adobe XD installed is essential. A free Adobe account may be required for access.</p>
                    <p>This course is ideal for beginners looking to create wireframes and interactive prototypes.</p>
                ',
                'course_outline' => '
                    <p>The course introduces Adobe XD and its core features:</p>
                    <ol>
                        <li><strong>Interface Overview:</strong> Tools, panels, and workspace customization.</li>
                        <li><strong>Design Tools:</strong> Shapes, text, images, and components.</li>
                        <li><strong>Prototyping:</strong> Linking screens, transitions, and interactions.</li>
                        <li><strong>Collaboration:</strong> Sharing designs, comments, and co-editing.</li>
                        <li><strong>Exporting:</strong> Preparing assets for development and presentations.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build confidence in using Adobe XD:</p>
                    <ul>
                        <li>Step-by-step tutorials and guided exercises.</li>
                        <li>Weekly design tasks and prototype builds.</li>
                        <li>Peer feedback and design walkthroughs.</li>
                        <li>Capstone project: Create and present a clickable prototype for a mobile or web app.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session introducing tools and techniques.</li>
                        <li>One lab session for hands-on design and prototyping.</li>
                        <li>Optional office hours for troubleshooting and feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps beginners get started with Adobe XD. It emphasizes ease of use, rapid prototyping, and collaboration.</p>
                    <p>By the end, students will be able to design and share interactive prototypes confidently.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn Adobe XD from scratch.</li>
                        <li>Create wireframes and interactive prototypes.</li>
                        <li>Collaborate and share designs professionally.</li>
                        <li>Prepare for UI/UX design roles or freelance projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Adobe XD, Creative Cloud, PNG/SVG Export, Web Sharing',
                'duration' => '5 Weeks',
            ],

            'Design Thinking Workshop' => [
                'basic_requirements' => '
                    <p>No prior experience is required. Participants should be open to collaboration and creative problem-solving.</p>
                    <p>A laptop or tablet with access to digital whiteboarding tools is helpful but not mandatory.</p>
                    <p>This course is ideal for innovators, entrepreneurs, and teams seeking to solve user-centered problems.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through the design thinking process:</p>
                    <ol>
                        <li><strong>Empathize:</strong> User interviews, observation, and journey mapping.</li>
                        <li><strong>Define:</strong> Problem framing and insight synthesis.</li>
                        <li><strong>Ideate:</strong> Brainstorming, sketching, and concept development.</li>
                        <li><strong>Prototype:</strong> Rapid prototyping and iteration.</li>
                        <li><strong>Test:</strong> User feedback, refinement, and storytelling.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to foster creativity and collaboration:</p>
                    <ul>
                        <li>Team-based exercises and design sprints.</li>
                        <li>Weekly challenges focused on real-world problems.</li>
                        <li>Peer feedback and iteration cycles.</li>
                        <li>Capstone project: Present a user-centered solution to a complex challenge.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> in workshop format:</p>
                    <ul>
                        <li>Interactive group sessions with guided facilitation.</li>
                        <li>Breakout activities and ideation labs.</li>
                        <li>Optional coaching and feedback sessions.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This workshop-style course introduces the design thinking methodology for solving complex problems. It emphasizes empathy, creativity, and iteration.</p>
                    <p>By the end, students will be able to apply design thinking to product, service, or organizational challenges.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master the design thinking process.</li>
                        <li>Collaborate effectively in multidisciplinary teams.</li>
                        <li>Generate and test innovative ideas.</li>
                        <li>Prepare for roles in innovation, strategy, and product development.</li>
                    </ul>
                ',
                'course_technologies' => 'Miro, Figma, Google Jamboard, Post-it App',
                'duration' => '4 Weeks',
            ],

            'Typography and Layout Essentials' => [
                'basic_requirements' => '
                    <p>No prior design experience is required. Participants should be comfortable using a computer and have an interest in visual communication.</p>
                    <p>A laptop with access to design tools like Figma, Adobe XD, or Canva is recommended.</p>
                    <p>This course is ideal for aspiring designers, marketers, and content creators looking to improve visual clarity and aesthetics.</p>
                ',
                'course_outline' => '
                    <p>The course explores the fundamentals of typography and layout design:</p>
                    <ol>
                        <li><strong>Typography Basics:</strong> Font families, hierarchy, readability, and pairing.</li>
                        <li><strong>Layout Principles:</strong> Grid systems, alignment, spacing, and composition.</li>
                        <li><strong>Visual Balance:</strong> Contrast, proximity, and white space usage.</li>
                        <li><strong>Responsive Design:</strong> Adapting layouts for different screen sizes.</li>
                        <li><strong>Project Work:</strong> Create print and digital layouts for real-world scenarios.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build design clarity and structure:</p>
                    <ul>
                        <li>Weekly design exercises focused on typography and layout.</li>
                        <li>Mini-projects including posters, web pages, and presentations.</li>
                        <li>Peer critiques and layout improvement sessions.</li>
                        <li>Capstone project: Design a multi-page layout with strong typographic hierarchy.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering design theory and examples.</li>
                        <li>One workshop session for hands-on layout creation.</li>
                        <li>Optional office hours for feedback and portfolio reviews.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners master the art of typography and layout. It emphasizes clarity, consistency, and visual impact across media.</p>
                    <p>By the end, students will be able to design professional layouts with strong typographic structure.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand typography and layout fundamentals.</li>
                        <li>Create visually balanced and readable designs.</li>
                        <li>Prepare for roles in graphic design and content creation.</li>
                        <li>Build a portfolio of layout-focused design projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Adobe XD, Canva, InDesign, Google Fonts',
                'duration' => '5 Weeks',
            ],

            'Figma for Interface Design' => [
                'basic_requirements' => '
                    <p>No prior design experience is required. Participants should be comfortable using web-based tools and have an interest in digital product design.</p>
                    <p>A laptop with internet access and a free Figma account is essential.</p>
                    <p>This course is ideal for aspiring UI designers, developers, and product managers.</p>
                ',
                'course_outline' => '
                    <p>The course introduces Figma and its interface design capabilities:</p>
                    <ol>
                        <li><strong>Figma Basics:</strong> Interface, tools, layers, and frames.</li>
                        <li><strong>Component Design:</strong> Reusable elements, variants, and auto layout.</li>
                        <li><strong>Prototyping:</strong> Interactions, transitions, and user flows.</li>
                        <li><strong>Collaboration:</strong> Comments, sharing, and team libraries.</li>
                        <li><strong>Project Work:</strong> Design a complete interface for a web or mobile app.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build interface design skills:</p>
                    <ul>
                        <li>Weekly design challenges and interface builds.</li>
                        <li>Mini-projects focused on components and layouts.</li>
                        <li>Peer feedback and usability testing sessions.</li>
                        <li>Capstone project: Design and prototype a responsive app interface.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Figma tools and workflows.</li>
                        <li>One lab session for hands-on interface design.</li>
                        <li>Optional office hours for design reviews and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners master Figma for interface design. It emphasizes modular design, collaboration, and prototyping.</p>
                    <p>By the end, students will be able to design and share professional-grade interfaces using Figma.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn Figma for UI and UX design.</li>
                        <li>Create responsive and interactive interfaces.</li>
                        <li>Collaborate effectively with teams and stakeholders.</li>
                        <li>Prepare for roles in product design and frontend development.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, FigJam, Auto Layout, Prototyping Tools',
                'duration' => '6 Weeks',
            ],
            'Color Theory in Digital Design' => [
                'basic_requirements' => '
                    <p>No prior design experience is required. Participants should have an interest in visual aesthetics and digital media.</p>
                    <p>A laptop with access to design tools like Adobe Color, Figma, or Canva is recommended.</p>
                    <p>This course is ideal for designers, marketers, and content creators looking to improve their use of color.</p>
                ',
                'course_outline' => '
                    <p>The course explores color theory and its application in digital design:</p>
                    <ol>
                        <li><strong>Color Fundamentals:</strong> Hue, saturation, value, and temperature.</li>
                        <li><strong>Color Harmonies:</strong> Complementary, analogous, triadic, and split-complementary schemes.</li>
                        <li><strong>Psychology of Color:</strong> Emotional impact and cultural associations.</li>
                        <li><strong>Accessibility:</strong> Contrast ratios and color blindness considerations.</li>
                        <li><strong>Project Work:</strong> Create color palettes and apply them to digital designs.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build color confidence and application skills:</p>
                    <ul>
                        <li>Weekly palette creation and design exercises.</li>
                        <li>Mini-projects focused on branding and UI color systems.</li>
                        <li>Peer critiques and color refinement sessions.</li>
                        <li>Capstone project: Design a brand identity using strategic color choices.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering color theory and examples.</li>
                        <li>One workshop session for palette creation and application.</li>
                        <li>Optional office hours for feedback and portfolio support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners understand and apply color theory in digital design. It emphasizes harmony, emotion, and accessibility.</p>
                    <p>By the end, students will be able to create compelling color palettes and apply them effectively across media.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master color theory for digital design.</li>
                        <li>Create accessible and emotionally resonant color palettes.</li>
                        <li>Prepare for branding, UI, and marketing design roles.</li>
                        <li>Build a portfolio of color-driven design projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Adobe Color, Figma, Canva, WCAG Tools',
                'duration' => '4 Weeks',
            ],

            'Mobile App UI Design' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of UI/UX principles and familiarity with design tools like Figma or Adobe XD.</p>
                    <p>A laptop with access to mobile design templates or prototyping tools is recommended.</p>
                    <p>This course is ideal for designers and developers interested in creating intuitive mobile interfaces.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on designing user interfaces for mobile applications:</p>
                    <ol>
                        <li><strong>Mobile Design Patterns:</strong> Navigation, gestures, and screen transitions.</li>
                        <li><strong>Platform Guidelines:</strong> iOS Human Interface and Android Material Design.</li>
                        <li><strong>Wireframing & Prototyping:</strong> Low- and high-fidelity mobile mockups.</li>
                        <li><strong>Responsive Layouts:</strong> Designing for multiple screen sizes and orientations.</li>
                        <li><strong>Project Work:</strong> Design a complete mobile app UI from concept to prototype.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build mobile-specific design skills:</p>
                    <ul>
                        <li>Weekly mobile UI challenges and design critiques.</li>
                        <li>Mini-projects focused on onboarding, navigation, and user flows.</li>
                        <li>Peer feedback and usability testing sessions.</li>
                        <li>Capstone project: Design and prototype a mobile app interface.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering mobile UI theory and examples.</li>
                        <li>One lab session for hands-on mobile design work.</li>
                        <li>Optional office hours for portfolio reviews and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners design user-friendly and visually appealing mobile app interfaces. It emphasizes platform conventions, usability, and responsive design.</p>
                    <p>By the end, students will be able to create polished mobile UI prototypes ready for development.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design mobile interfaces that follow platform best practices.</li>
                        <li>Build interactive prototypes for iOS and Android apps.</li>
                        <li>Prepare for mobile UI/UX roles or freelance app design work.</li>
                        <li>Develop a mobile-focused portfolio project.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Adobe XD, Material Design, iOS HIG, ProtoPie',
                'duration' => '6 Weeks',
            ],
            'Wireframing and Prototyping' => [
                'basic_requirements' => '
                    <p>No prior experience is required. Participants should be comfortable using digital tools and have an interest in product design or development.</p>
                    <p>A laptop with access to Figma, Balsamiq, or Adobe XD is recommended.</p>
                    <p>This course is ideal for designers, developers, and product teams building user interfaces.</p>
                ',
                'course_outline' => '
                    <p>The course covers the process of wireframing and prototyping digital products:</p>
                    <ol>
                        <li><strong>Wireframing Basics:</strong> Sketching, low-fidelity design, and layout planning.</li>
                        <li><strong>Prototyping Tools:</strong> Creating interactive mockups and user flows.</li>
                        <li><strong>Feedback & Iteration:</strong> Usability testing and design refinement.</li>
                        <li><strong>Collaboration:</strong> Sharing prototypes and gathering stakeholder input.</li>
                        <li><strong>Project Work:</strong> Build a complete wireframe-to-prototype workflow for a digital product.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build rapid design and iteration skills:</p>
                    <ul>
                        <li>Weekly wireframing and prototyping exercises.</li>
                        <li>Mini-projects focused on user journeys and task flows.</li>
                        <li>Peer reviews and usability testing sessions.</li>
                        <li>Capstone project: Design, prototype, and present a digital product concept.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering tools and workflows.</li>
                        <li>One lab session for hands-on wireframing and prototyping.</li>
                        <li>Optional office hours for design feedback and iteration support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to plan, design, and prototype digital products. It emphasizes speed, clarity, and collaboration in the design process.</p>
                    <p>By the end, students will be able to create and test interactive prototypes that communicate design intent effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master wireframing and prototyping tools and techniques.</li>
                        <li>Communicate design ideas clearly and efficiently.</li>
                        <li>Prepare for roles in UI/UX, product design, and development.</li>
                        <li>Build a portfolio of interactive prototypes.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Balsamiq, Adobe XD, InVision, Marvel',
                'duration' => '5 Weeks',
            ],

            'Accessibility in Design' => [
                'basic_requirements' => '
                    <p>No prior experience is required. Participants should have a basic understanding of digital design or development.</p>
                    <p>A laptop with access to design tools and browser accessibility extensions is recommended.</p>
                    <p>This course is ideal for designers, developers, and content creators committed to inclusive design.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on designing accessible digital experiences:</p>
                    <ol>
                        <li><strong>Accessibility Principles:</strong> POUR (Perceivable, Operable, Understandable, Robust).</li>
                        <li><strong>Design Considerations:</strong> Color contrast, typography, and keyboard navigation.</li>
                        <li><strong>Assistive Technologies:</strong> Screen readers, alt text, and ARIA roles.</li>
                        <li><strong>Testing & Compliance:</strong> WCAG guidelines and accessibility audits.</li>
                        <li><strong>Project Work:</strong> Redesign an existing interface to meet accessibility standards.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build inclusive design skills:</p>
                    <ul>
                        <li>Weekly accessibility audits and redesign tasks.</li>
                        <li>Mini-projects focused on improving usability for all users.</li>
                        <li>Peer reviews and inclusive design critiques.</li>
                        <li>Capstone project: Create an accessible interface and document your design decisions.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering accessibility theory and tools.</li>
                        <li>One lab session for testing and redesigning interfaces.</li>
                        <li>Optional office hours for compliance support and feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course empowers learners to design inclusive and accessible digital products. It emphasizes empathy, usability, and compliance with global standards.</p>
                    <p>By the end, students will be able to identify and address accessibility barriers in their designs.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design inclusive experiences for all users.</li>
                        <li>Understand and apply WCAG accessibility standards.</li>
                        <li>Prepare for roles in inclusive design and compliance.</li>
                        <li>Build a portfolio of accessible design projects.</li>
                    </ul>
                ',
                'course_technologies' => 'WCAG, Axe DevTools, WAVE, Figma, ARIA, NVDA',
                'duration' => '4 Weeks',
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
            'Network Security Basics' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of computer networks and internet protocols. No prior security experience is required.</p>
                    <p>A laptop with access to network simulation tools or virtual labs is recommended.</p>
                    <p>This course is ideal for IT support staff, junior network admins, and anyone new to cybersecurity.</p>
                ',
                'course_outline' => '
                    <p>The course introduces core concepts of securing computer networks:</p>
                    <ol>
                        <li><strong>Network Fundamentals:</strong> TCP/IP, DNS, DHCP, and routing basics.</li>
                        <li><strong>Threats & Vulnerabilities:</strong> Common attack vectors and mitigation strategies.</li>
                        <li><strong>Firewalls & IDS:</strong> Configuration, monitoring, and response techniques.</li>
                        <li><strong>Secure Protocols:</strong> HTTPS, SSH, VPNs, and encryption standards.</li>
                        <li><strong>Best Practices:</strong> Network segmentation, access control, and patch management.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build foundational security skills:</p>
                    <ul>
                        <li>Weekly network configuration and security exercises.</li>
                        <li>Mini-projects focused on securing small office/home networks.</li>
                        <li>Peer reviews and troubleshooting labs.</li>
                        <li>Capstone project: Design and secure a network for a fictional organization.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering network security theory.</li>
                        <li>One lab session for hands-on configuration and testing.</li>
                        <li>Optional office hours for mentoring and lab support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course helps learners understand and implement basic network security measures. It emphasizes practical configuration, threat awareness, and secure communication.</p>
                    <p>By the end, students will be able to secure small networks and respond to common threats.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand network security fundamentals.</li>
                        <li>Configure firewalls, VPNs, and secure protocols.</li>
                        <li>Prepare for roles in IT support and network administration.</li>
                        <li>Build a foundation for advanced cybersecurity training.</li>
                    </ul>
                ',
                'course_technologies' => 'Cisco Packet Tracer, Wireshark, pfSense, OpenVPN, SSH',
                'duration' => '6 Weeks',
            ],
            'Web Application Security' => [
                'basic_requirements' => '
                    <p>Participants should have experience with web development and a basic understanding of HTTP and databases. Familiarity with JavaScript and server-side frameworks is helpful.</p>
                    <p>A laptop with access to local development environments and security testing tools is recommended.</p>
                    <p>This course is ideal for developers and security professionals focused on securing web applications.</p>
                ',
                'course_outline' => '
                    <p>The course explores vulnerabilities and defenses in web applications:</p>
                    <ol>
                        <li><strong>OWASP Top 10:</strong> Common vulnerabilities like XSS, SQL injection, CSRF, and insecure deserialization.</li>
                        <li><strong>Secure Coding Practices:</strong> Input validation, authentication, and session management.</li>
                        <li><strong>Security Testing:</strong> Manual and automated testing tools and techniques.</li>
                        <li><strong>Mitigation Strategies:</strong> Content security policies, HTTPS, and secure headers.</li>
                        <li><strong>Project Work:</strong> Audit and secure a sample web application.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build secure development and testing skills:</p>
                    <ul>
                        <li>Weekly vulnerability discovery and patching exercises.</li>
                        <li>Mini-projects focused on secure login systems and data protection.</li>
                        <li>Peer code reviews and security walkthroughs.</li>
                        <li>Capstone project: Secure a web app and document the security improvements.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering web security theory and case studies.</li>
                        <li>One lab session for hands-on testing and remediation.</li>
                        <li>Optional office hours for code reviews and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to identify and fix security flaws in web applications. It emphasizes secure coding, vulnerability testing, and compliance with best practices.</p>
                    <p>By the end, students will be able to build and maintain secure web applications.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand and mitigate common web vulnerabilities.</li>
                        <li>Apply secure coding and testing practices.</li>
                        <li>Prepare for roles in secure development and application security.</li>
                        <li>Build a portfolio of secure web projects.</li>
                    </ul>
                ',
                'course_technologies' => 'OWASP ZAP, Burp Suite, HTTPS, JWT, CSP, SQLi/XSS Labs',
                'duration' => '7 Weeks',
            ],
            'CompTIA Security+ Prep' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of IT concepts, including networking and system administration. No prior cybersecurity certification is required.</p>
                    <p>A laptop with internet access and access to practice exam platforms is recommended.</p>
                    <p>This course is ideal for professionals preparing for the CompTIA Security+ certification exam.</p>
                ',
                'course_outline' => '
                    <p>The course covers all domains of the Security+ exam:</p>
                    <ol>
                        <li><strong>Threats, Attacks & Vulnerabilities:</strong> Malware, social engineering, and penetration testing.</li>
                        <li><strong>Architecture & Design:</strong> Secure network and system design principles.</li>
                        <li><strong>Implementation:</strong> Security controls, protocols, and device hardening.</li>
                        <li><strong>Operations & Incident Response:</strong> Monitoring, logging, and incident handling.</li>
                        <li><strong>Governance, Risk & Compliance:</strong> Policies, frameworks, and legal considerations.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are structured to align with the Security+ exam objectives:</p>
                    <ul>
                        <li>Weekly quizzes and domain-specific practice tests.</li>
                        <li>Scenario-based labs and simulations.</li>
                        <li>Peer discussion and exam strategy sessions.</li>
                        <li>Capstone project: Full-length mock exam with personalized feedback.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering exam topics and strategies.</li>
                        <li>One lab session for hands-on practice and review.</li>
                        <li>Optional office hours for certification guidance and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course prepares learners for the CompTIA Security+ certification. It emphasizes exam readiness, practical skills, and foundational cybersecurity knowledge.</p>
                    <p>By the end, students will be confident in taking the Security+ exam and applying its principles in real-world scenarios.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Comprehensive coverage of Security+ exam domains.</li>
                        <li>Hands-on labs and practice tests.</li>
                        <li>Prepare for entry-level cybersecurity roles.</li>
                        <li>Earn a globally recognized certification.</li>
                    </ul>
                ',
                'course_technologies' => 'Security+ Exam Objectives, Practice Labs, ExamSim, CompTIA CertMaster',
                'duration' => '6 Weeks',
            ],

            'Cyber Threat Intelligence' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of cybersecurity concepts and threat landscapes. Familiarity with network protocols and security tools is helpful.</p>
                    <p>A laptop with access to threat feeds, SIEM platforms, or open-source intelligence tools is recommended.</p>
                    <p>This course is ideal for analysts, incident responders, and security strategists.</p>
                ',
                'course_outline' => '
                    <p>The course explores threat intelligence collection, analysis, and application:</p>
                    <ol>
                        <li><strong>Threat Intelligence Lifecycle:</strong> Planning, collection, processing, analysis, dissemination, and feedback.</li>
                        <li><strong>Sources & Feeds:</strong> OSINT, commercial feeds, and dark web monitoring.</li>
                        <li><strong>Indicators of Compromise (IOCs):</strong> Detection, correlation, and enrichment.</li>
                        <li><strong>Threat Attribution:</strong> Actor profiling, TTPs, and campaign tracking.</li>
                        <li><strong>Operational Use:</strong> Integrating intelligence into security operations and decision-making.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build threat analysis and reporting skills:</p>
                    <ul>
                        <li>Weekly threat hunting and IOC enrichment exercises.</li>
                        <li>Mini-projects focused on actor profiling and campaign analysis.</li>
                        <li>Peer reviews and intelligence briefings.</li>
                        <li>Capstone project: Develop and present a threat intelligence report for a simulated organization.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering threat intelligence theory and tools.</li>
                        <li>One lab session for hands-on analysis and reporting.</li>
                        <li>Optional office hours for feedback and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to collect, analyze, and apply cyber threat intelligence. It emphasizes proactive defense, strategic insight, and operational integration.</p>
                    <p>By the end, students will be able to produce actionable intelligence and support security operations.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand the threat intelligence lifecycle and sources.</li>
                        <li>Analyze and report on cyber threats and actors.</li>
                        <li>Prepare for roles in threat analysis and security operations.</li>
                        <li>Build a portfolio of intelligence reports and briefings.</li>
                    </ul>
                ',
                'course_technologies' => 'MITRE ATT&CK, MISP, ThreatConnect, OSINT Tools, STIX/TAXII',
                'duration' => '7 Weeks',
            ],
            'Incident Response and Forensics' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of cybersecurity and system administration. Familiarity with logs, file systems, and network protocols is helpful.</p>
                    <p>A laptop with access to forensic tools and virtual labs is recommended.</p>
                    <p>This course is ideal for incident responders, forensic analysts, and SOC professionals.</p>
                ',
                'course_outline' => '
                    <p>The course covers incident response procedures and digital forensic techniques:</p>
                    <ol>
                        <li><strong>Incident Response Phases:</strong> Preparation, detection, containment, eradication, recovery, and lessons learned.</li>
                        <li><strong>Evidence Collection:</strong> Chain of custody, imaging, and preservation.</li>
                        <li><strong>Log Analysis:</strong> System, application, and network logs.</li>
                        <li><strong>Forensic Tools:</strong> File carving, timeline analysis, and malware reverse engineering.</li>
                        <li><strong>Reporting:</strong> Documentation, communication, and legal considerations.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build response and investigation skills:</p>
                    <ul>
                        <li>Weekly incident simulations and forensic labs.</li>
                        <li>Mini-projects focused on evidence analysis and reporting.</li>
                        <li>Peer reviews and tabletop exercises.</li>
                        <li>Capstone project: Conduct a full incident investigation and present findings.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering IR and forensic theory.</li>
                        <li>One lab session for hands-on investigation and analysis.</li>
                        <li>Optional office hours for mentoring and report reviews.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to respond to security incidents and conduct forensic investigations. It emphasizes evidence integrity, analytical rigor, and communication.</p>
                    <p>By the end, students will be able to manage incidents and perform forensic analysis confidently.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master incident response and digital forensics workflows.</li>
                        <li>Analyze logs, artifacts, and malware samples.</li>
                        <li>Prepare for roles in SOC, IR, and forensic analysis.</li>
                        <li>Build a portfolio of investigation reports and lab work.</li>
                    </ul>
                ',
                'course_technologies' => 'Autopsy, Volatility, FTK Imager, ELK Stack, Sysmon, Wireshark',
                'duration' => '8 Weeks',
            ],
            'Cloud Security Fundamentals' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of cloud computing and IT infrastructure. Familiarity with AWS, Azure, or GCP is helpful but not required.</p>
                    <p>A laptop with access to cloud platforms or sandbox environments is recommended.</p>
                    <p>This course is ideal for cloud engineers, IT administrators, and security professionals transitioning to cloud roles.</p>
                ',
                'course_outline' => '
                    <p>The course covers foundational cloud security concepts and practices:</p>
                    <ol>
                        <li><strong>Shared Responsibility Model:</strong> Understanding roles of cloud providers and customers.</li>
                        <li><strong>Identity & Access Management:</strong> Roles, policies, MFA, and least privilege.</li>
                        <li><strong>Data Protection:</strong> Encryption, key management, and secure storage.</li>
                        <li><strong>Network Security:</strong> Firewalls, VPCs, and secure connectivity.</li>
                        <li><strong>Compliance & Monitoring:</strong> Logging, auditing, and regulatory frameworks.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build secure cloud architecture skills:</p>
                    <ul>
                        <li>Weekly labs on IAM, encryption, and network controls.</li>
                        <li>Mini-projects focused on securing cloud workloads.</li>
                        <li>Peer reviews and compliance mapping exercises.</li>
                        <li>Capstone project: Design and secure a cloud-based application infrastructure.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering cloud security theory and tools.</li>
                        <li>One lab session for hands-on cloud configuration and testing.</li>
                        <li>Optional office hours for mentoring and cloud walkthroughs.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to secure cloud environments across major platforms. It emphasizes identity management, data protection, and compliance.</p>
                    <p>By the end, students will be able to implement core cloud security controls and monitor cloud assets effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand cloud security principles and shared responsibility.</li>
                        <li>Configure IAM, encryption, and secure networking.</li>
                        <li>Prepare for cloud security certifications and roles.</li>
                        <li>Build a portfolio of secure cloud architectures.</li>
                    </ul>
                ',
                'course_technologies' => 'AWS IAM, Azure Security Center, GCP Cloud Armor, KMS, VPC, CloudTrail',
                'duration' => '7 Weeks',
            ],
            'Malware Analysis Techniques' => [
                'basic_requirements' => '
                    <p>Participants should have intermediate knowledge of operating systems and cybersecurity. Familiarity with scripting and file systems is recommended.</p>
                    <p>A laptop with access to sandbox environments and malware analysis tools is essential.</p>
                    <p>This course is ideal for security analysts, forensic investigators, and malware researchers.</p>
                ',
                'course_outline' => '
                    <p>The course explores static and dynamic malware analysis techniques:</p>
                    <ol>
                        <li><strong>Malware Types:</strong> Trojans, ransomware, worms, and fileless malware.</li>
                        <li><strong>Static Analysis:</strong> File inspection, strings, and disassembly.</li>
                        <li><strong>Dynamic Analysis:</strong> Behavior monitoring, sandboxing, and debugging.</li>
                        <li><strong>Reverse Engineering:</strong> Tools and techniques for code analysis.</li>
                        <li><strong>Reporting:</strong> Documentation, IOC extraction, and threat attribution.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build malware detection and analysis skills:</p>
                    <ul>
                        <li>Weekly labs on malware samples and sandbox testing.</li>
                        <li>Mini-projects focused on reverse engineering and IOC generation.</li>
                        <li>Peer reviews and malware classification exercises.</li>
                        <li>Capstone project: Analyze a malware sample and produce a detailed report.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering malware theory and case studies.</li>
                        <li>One lab session for hands-on analysis and reporting.</li>
                        <li>Optional office hours for mentoring and tool support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to analyze and understand malicious software. It emphasizes safe handling, reverse engineering, and threat intelligence.</p>
                    <p>By the end, students will be able to dissect malware and contribute to incident response and threat hunting efforts.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Identify and analyze various types of malware.</li>
                        <li>Use static and dynamic analysis tools effectively.</li>
                        <li>Prepare for roles in malware research and digital forensics.</li>
                        <li>Build a portfolio of malware analysis reports.</li>
                    </ul>
                ',
                'course_technologies' => 'IDA Pro, Ghidra, Cuckoo Sandbox, PEiD, Sysinternals, Wireshark',
                'duration' => '8 Weeks',
            ],
            'Zero Trust Architecture' => [
                'basic_requirements' => '
                    <p>Participants should have a solid understanding of networking, identity management, and cybersecurity principles. Familiarity with enterprise IT environments is helpful.</p>
                    <p>A laptop with access to network simulation tools or cloud platforms is recommended.</p>
                    <p>This course is ideal for security architects, IT managers, and enterprise defenders.</p>
                ',
                'course_outline' => '
                    <p>The course introduces Zero Trust principles and implementation strategies:</p>
                    <ol>
                        <li><strong>Zero Trust Fundamentals:</strong> Never trust, always verify; least privilege; microsegmentation.</li>
                        <li><strong>Identity & Access:</strong> Strong authentication, conditional access, and continuous verification.</li>
                        <li><strong>Network Controls:</strong> Segmentation, encryption, and secure access service edge (SASE).</li>
                        <li><strong>Monitoring & Response:</strong> Telemetry, anomaly detection, and automated response.</li>
                        <li><strong>Implementation Roadmap:</strong> Planning, tooling, and organizational alignment.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build strategic and technical Zero Trust skills:</p>
                    <ul>
                        <li>Weekly design exercises and architecture reviews.</li>
                        <li>Mini-projects focused on identity, access, and segmentation.</li>
                        <li>Peer critiques and implementation planning sessions.</li>
                        <li>Capstone project: Design a Zero Trust architecture for a simulated enterprise.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Zero Trust theory and frameworks.</li>
                        <li>One workshop session for architecture planning and tool evaluation.</li>
                        <li>Optional office hours for mentoring and roadmap feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to design and implement Zero Trust security models. It emphasizes identity-centric controls, continuous verification, and adaptive defense.</p>
                    <p>By the end, students will be able to architect and advocate for Zero Trust strategies in complex environments.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand and apply Zero Trust principles.</li>
                        <li>Design secure architectures for modern enterprises.</li>
                        <li>Prepare for strategic roles in cybersecurity and IT leadership.</li>
                        <li>Build a portfolio of Zero Trust design artifacts.</li>
                    </ul>
                ',
                'course_technologies' => 'Azure AD, Okta, Zscaler, Palo Alto Prisma, SASE, MFA, SIEM',
                'duration' => '6 Weeks',
            ],

            'AWS Cloud Practitioner Essentials' => [
                'basic_requirements' => '
                    <p>No prior cloud experience is required. Participants should be comfortable using web-based tools and have basic IT literacy.</p>
                    <p>A laptop with internet access and an AWS Free Tier account is recommended.</p>
                    <p>This course is ideal for beginners, business professionals, and aspiring cloud engineers.</p>
                ',
                'course_outline' => '
                    <p>The course introduces foundational AWS cloud concepts and services:</p>
                    <ol>
                        <li><strong>Cloud Concepts:</strong> Benefits, deployment models, and global infrastructure.</li>
                        <li><strong>AWS Core Services:</strong> Compute, storage, networking, and databases.</li>
                        <li><strong>Security & Compliance:</strong> IAM, shared responsibility model, and AWS compliance programs.</li>
                        <li><strong>Billing & Pricing:</strong> Cost management, pricing models, and support plans.</li>
                        <li><strong>Use Cases:</strong> Real-world applications across industries.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build cloud fluency and AWS familiarity:</p>
                    <ul>
                        <li>Weekly quizzes and service walkthroughs.</li>
                        <li>Mini-projects using AWS Console and Free Tier services.</li>
                        <li>Peer discussions and scenario-based exercises.</li>
                        <li>Capstone project: Present a cloud solution for a fictional business case.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering AWS concepts and demos.</li>
                        <li>Optional labs and certification prep sessions.</li>
                        <li>Office hours for mentoring and exam guidance.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course provides a non-technical introduction to AWS cloud services. It emphasizes business value, security, and cost optimization.</p>
                    <p>By the end, students will be prepared for the AWS Cloud Practitioner certification and cloud-related roles.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand AWS cloud fundamentals and services.</li>
                        <li>Prepare for the AWS Cloud Practitioner exam.</li>
                        <li>Explore cloud use cases and pricing models.</li>
                        <li>Build a foundation for advanced cloud and DevOps training.</li>
                    </ul>
                ',
                'course_technologies' => 'AWS Console, IAM, EC2, S3, RDS, CloudWatch',
                'duration' => '5 Weeks',
            ],

            'Docker and Containerization' => [
                'basic_requirements' => '
                    <p>Participants should have basic command-line skills and familiarity with software development or system administration.</p>
                    <p>A laptop with Docker installed or access to a container lab environment is recommended.</p>
                    <p>This course is ideal for developers, DevOps engineers, and IT professionals.</p>
                ',
                'course_outline' => '
                    <p>The course covers containerization concepts and Docker workflows:</p>
                    <ol>
                        <li><strong>Container Fundamentals:</strong> Images, containers, volumes, and networking.</li>
                        <li><strong>Docker CLI & Compose:</strong> Building, running, and orchestrating containers.</li>
                        <li><strong>Best Practices:</strong> Layering, tagging, and security considerations.</li>
                        <li><strong>Integration:</strong> CI/CD pipelines and cloud deployment.</li>
                        <li><strong>Project Work:</strong> Containerize and deploy a sample application.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build containerization and deployment skills:</p>
                    <ul>
                        <li>Weekly Dockerfile and Compose exercises.</li>
                        <li>Mini-projects focused on multi-container apps and orchestration.</li>
                        <li>Peer reviews and optimization sessions.</li>
                        <li>Capstone project: Containerize and deploy a full-stack application.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Docker concepts and demos.</li>
                        <li>One lab session for container building and deployment.</li>
                        <li>Optional office hours for troubleshooting and mentoring.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use Docker for application packaging and deployment. It emphasizes portability, scalability, and DevOps integration.</p>
                    <p>By the end, students will be able to build and manage containerized applications confidently.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master Docker and containerization workflows.</li>
                        <li>Build and deploy containerized applications.</li>
                        <li>Prepare for roles in DevOps and cloud-native development.</li>
                        <li>Build a portfolio of containerized projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Docker, Docker Compose, Docker Hub, Kubernetes (intro), GitHub Actions',
                'duration' => '6 Weeks',
            ],

            'CI/CD with Jenkins' => [
                'basic_requirements' => '
                    <p>Participants should have basic programming or scripting experience and familiarity with version control systems like Git.</p>
                    <p>A laptop with Jenkins installed or access to a CI/CD lab environment is recommended.</p>
                    <p>This course is ideal for developers, DevOps engineers, and automation specialists.</p>
                ',
                'course_outline' => '
                    <p>The course covers continuous integration and deployment using Jenkins:</p>
                    <ol>
                        <li><strong>CI/CD Fundamentals:</strong> Principles, benefits, and pipeline stages.</li>
                        <li><strong>Jenkins Setup:</strong> Installation, plugins, and configuration.</li>
                        <li><strong>Pipeline Creation:</strong> Declarative and scripted pipelines.</li>
                        <li><strong>Integration:</strong> Git, Docker, and testing frameworks.</li>
                        <li><strong>Project Work:</strong> Build and deploy a CI/CD pipeline for a sample application.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build automation and deployment skills:</p>
                    <ul>
                        <li>Weekly pipeline design and integration exercises.</li>
                        <li>Mini-projects focused on build automation and testing.</li>
                        <li>Peer reviews and pipeline optimization sessions.</li>
                        <li>Capstone project: Create and deploy a CI/CD pipeline with Jenkins.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering CI/CD theory and Jenkins workflows.</li>
                        <li>One lab session for pipeline creation and deployment.</li>
                        <li>Optional office hours for mentoring and troubleshooting.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to automate software delivery using Jenkins. It emphasizes reliability, speed, and integration with modern development tools.</p>
                    <p>By the end, students will be able to build robust CI/CD pipelines for real-world projects.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Automate builds, tests, and deployments using Jenkins.</li>
                        <li>Integrate CI/CD into development workflows.</li>
                        <li>Prepare for DevOps and automation engineering roles.</li>
                        <li>Build a portfolio of CI/CD pipelines and deployment strategies.</li>
                    </ul>
                ',
                'course_technologies' => 'Jenkins, Git, Docker, Maven, JUnit, GitHub Actions',
                'duration' => '6 Weeks',
            ],

            'Kubernetes for Developers' => [
                'basic_requirements' => '
                    <p>Participants should have experience with Docker and basic command-line tools. Familiarity with YAML and cloud-native application development is helpful.</p>
                    <p>A laptop with access to a Kubernetes cluster (local or cloud-based) is recommended.</p>
                    <p>This course is ideal for developers and DevOps engineers building and deploying containerized applications.</p>
                ',
                'course_outline' => '
                    <p>The course covers Kubernetes architecture and application deployment workflows:</p>
                    <ol>
                        <li><strong>Core Concepts:</strong> Pods, deployments, services, and namespaces.</li>
                        <li><strong>Configuration:</strong> ConfigMaps, secrets, and environment variables.</li>
                        <li><strong>Scaling & Updates:</strong> Horizontal scaling, rolling updates, and health checks.</li>
                        <li><strong>Networking & Storage:</strong> Ingress, volumes, and persistent storage.</li>
                        <li><strong>Project Work:</strong> Deploy and manage a multi-tier application on Kubernetes.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build orchestration and deployment skills:</p>
                    <ul>
                        <li>Weekly YAML configuration and deployment exercises.</li>
                        <li>Mini-projects focused on scaling, secrets, and service exposure.</li>
                        <li>Peer reviews and troubleshooting labs.</li>
                        <li>Capstone project: Deploy and manage a production-ready app on Kubernetes.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Kubernetes theory and architecture.</li>
                        <li>One lab session for hands-on cluster management and deployment.</li>
                        <li>Optional office hours for mentoring and debugging support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to deploy, scale, and manage containerized applications using Kubernetes. It emphasizes declarative configuration, resilience, and cloud-native best practices.</p>
                    <p>By the end, students will be able to confidently use Kubernetes in development and production environments.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master Kubernetes fundamentals and deployment workflows.</li>
                        <li>Build and manage scalable containerized applications.</li>
                        <li>Prepare for roles in DevOps, SRE, and cloud-native development.</li>
                        <li>Build a portfolio of Kubernetes deployment projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Kubernetes, kubectl, Minikube, Helm, YAML, Docker',
                'duration' => '7 Weeks',
            ],

            'Terraform Infrastructure as Code' => [
                'basic_requirements' => '
                    <p>Participants should have basic knowledge of cloud platforms (AWS, Azure, or GCP) and command-line tools. Familiarity with infrastructure concepts is helpful.</p>
                    <p>A laptop with Terraform installed and access to a cloud provider account is recommended.</p>
                    <p>This course is ideal for DevOps engineers, cloud architects, and system administrators.</p>
                ',
                'course_outline' => '
                    <p>The course covers infrastructure provisioning using Terraform:</p>
                    <ol>
                        <li><strong>Terraform Basics:</strong> Providers, resources, and state management.</li>
                        <li><strong>Modules & Variables:</strong> Reusability, parameterization, and outputs.</li>
                        <li><strong>Provisioning Workflows:</strong> Plan, apply, destroy, and remote backends.</li>
                        <li><strong>Security & Best Practices:</strong> Secrets management, version control, and drift detection.</li>
                        <li><strong>Project Work:</strong> Build and manage infrastructure for a multi-tier application.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build infrastructure automation skills:</p>
                    <ul>
                        <li>Weekly Terraform configuration and deployment exercises.</li>
                        <li>Mini-projects focused on reusable modules and cloud provisioning.</li>
                        <li>Peer reviews and code optimization sessions.</li>
                        <li>Capstone project: Provision and manage infrastructure for a cloud-native application.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Terraform syntax and workflows.</li>
                        <li>One lab session for hands-on infrastructure provisioning.</li>
                        <li>Optional office hours for code reviews and cloud support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to define and manage infrastructure using Terraform. It emphasizes automation, modularity, and cloud-agnostic provisioning.</p>
                    <p>By the end, students will be able to build scalable infrastructure using code.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Automate infrastructure provisioning with Terraform.</li>
                        <li>Use modules and variables for reusable configurations.</li>
                        <li>Prepare for roles in DevOps and cloud engineering.</li>
                        <li>Build a portfolio of infrastructure-as-code projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Terraform, AWS, Azure, GCP, Git, HCL',
                'duration' => '6 Weeks',
            ],

            'DevOps Capstone Project' => [
                'basic_requirements' => '
                    <p>Participants should have completed foundational DevOps courses or have equivalent experience with CI/CD, containers, and cloud platforms.</p>
                    <p>A laptop with access to cloud services, version control, and deployment tools is essential.</p>
                    <p>This course is ideal for learners ready to apply their DevOps skills in a real-world scenario.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through planning and executing a full DevOps pipeline:</p>
                    <ol>
                        <li><strong>Project Planning:</strong> Define objectives, architecture, and toolchain.</li>
                        <li><strong>Infrastructure Setup:</strong> Provision environments using IaC tools.</li>
                        <li><strong>CI/CD Pipeline:</strong> Automate build, test, and deployment workflows.</li>
                        <li><strong>Monitoring & Logging:</strong> Implement observability and alerting.</li>
                        <li><strong>Presentation:</strong> Document and present the complete DevOps solution.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to integrate DevOps tools and practices:</p>
                    <ul>
                        <li>Weekly project milestones and deliverables.</li>
                        <li>Peer collaboration and code reviews.</li>
                        <li>Mentoring sessions and architecture critiques.</li>
                        <li>Final presentation: Deliver a fully functional DevOps pipeline with documentation.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One project planning session with instructor guidance.</li>
                        <li>Optional labs for implementation and troubleshooting.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply DevOps principles in a comprehensive project. It emphasizes integration, automation, and real-world problem solving.</p>
                    <p>By the end, students will have a complete DevOps portfolio project ready for employers or clients.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Apply DevOps tools and practices in a real-world scenario.</li>
                        <li>Demonstrate end-to-end automation and deployment skills.</li>
                        <li>Prepare for advanced roles in DevOps and cloud engineering.</li>
                        <li>Build a showcase portfolio project with documentation and metrics.</li>
                    </ul>
                ',
                'course_technologies' => 'Jenkins, Docker, Kubernetes, Terraform, Prometheus, Grafana, GitHub Actions',
                'duration' => '6 Weeks',
            ],

            'Introduction to Machine Learning' => [
                'basic_requirements' => '
                    <p>Participants should have basic Python programming skills and a foundational understanding of statistics and linear algebra.</p>
                    <p>A laptop with Python, scikit-learn, and Jupyter Notebook installed is recommended.</p>
                    <p>This course is ideal for aspiring data scientists, analysts, and developers exploring machine learning.</p>
                ',
                'course_outline' => '
                    <p>The course introduces core machine learning concepts and algorithms:</p>
                    <ol>
                        <li><strong>ML Foundations:</strong> Supervised vs unsupervised learning, model training, and evaluation.</li>
                        <li><strong>Algorithms:</strong> Linear regression, decision trees, k-NN, and clustering.</li>
                        <li><strong>Data Preparation:</strong> Feature engineering, normalization, and splitting.</li>
                        <li><strong>Model Tuning:</strong> Cross-validation, hyperparameter optimization, and performance metrics.</li>
                        <li><strong>Project Work:</strong> Build and evaluate models using real-world datasets.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build practical ML skills:</p>
                    <ul>
                        <li>Weekly coding labs and algorithm walkthroughs.</li>
                        <li>Mini-projects focused on regression, classification, and clustering.</li>
                        <li>Peer reviews and model comparison sessions.</li>
                        <li>Capstone project: Build and present a machine learning solution for a business problem.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering ML theory and examples.</li>
                        <li>One lab session for hands-on model building and evaluation.</li>
                        <li>Optional office hours for mentoring and project support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches the fundamentals of machine learning using Python. It emphasizes algorithm selection, model evaluation, and real-world application.</p>
                    <p>By the end, students will be able to build and interpret basic ML models confidently.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand key machine learning algorithms and workflows.</li>
                        <li>Build and evaluate models using Python and scikit-learn.</li>
                        <li>Prepare for roles in data science and AI development.</li>
                        <li>Build a portfolio of machine learning projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, scikit-learn, pandas, NumPy, Jupyter Notebook',
                'duration' => '7 Weeks',
            ],

            'Deep Learning with TensorFlow' => [
                'basic_requirements' => '
                    <p>Participants should have intermediate Python skills and prior exposure to machine learning concepts. Familiarity with NumPy and matrix operations is helpful.</p>
                    <p>A laptop with TensorFlow and Jupyter Notebook installed is recommended.</p>
                    <p>This course is ideal for developers and data scientists building neural networks and deep learning models.</p>
                ',
                'course_outline' => '
                    <p>The course covers deep learning fundamentals and TensorFlow workflows:</p>
                    <ol>
                        <li><strong>Neural Network Basics:</strong> Perceptrons, activation functions, and backpropagation.</li>
                        <li><strong>TensorFlow Framework:</strong> Tensors, layers, models, and training loops.</li>
                        <li><strong>Model Architectures:</strong> CNNs, RNNs, and feedforward networks.</li>
                        <li><strong>Optimization & Regularization:</strong> Loss functions, optimizers, dropout, and batch normalization.</li>
                        <li><strong>Project Work:</strong> Build and train deep learning models for image or text data.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build deep learning and TensorFlow skills:</p>
                    <ul>
                        <li>Weekly coding labs and architecture walkthroughs.</li>
                        <li>Mini-projects focused on image classification and sequence modeling.</li>
                        <li>Peer reviews and model tuning sessions.</li>
                        <li>Capstone project: Build and present a deep learning model for a real-world dataset.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering deep learning theory and TensorFlow demos.</li>
                        <li>One lab session for hands-on model building and training.</li>
                        <li>Optional office hours for mentoring and debugging support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to build and train deep learning models using TensorFlow. It emphasizes architecture design, optimization, and real-world applications.</p>
                    <p>By the end, students will be able to implement neural networks for image, text, and structured data.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master deep learning concepts and TensorFlow workflows.</li>
                        <li>Build and train neural networks for various data types.</li>
                        <li>Prepare for roles in AI development and research.</li>
                        <li>Build a portfolio of deep learning projects.</li>
                    </ul>
                ',
                'course_technologies' => 'TensorFlow, Keras, NumPy, pandas, Matplotlib, Jupyter',
                'duration' => '8 Weeks',
            ],

            'Natural Language Processing (NLP)' => [
                'basic_requirements' => '
                    <p>Participants should have intermediate Python skills and familiarity with machine learning concepts. Experience with text data is helpful.</p>
                    <p>A laptop with access to NLP libraries like spaCy, NLTK, or Hugging Face Transformers is recommended.</p>
                    <p>This course is ideal for developers and data scientists working with language data.</p>
                ',
                'course_outline' => '
                    <p>The course explores techniques for processing and modeling human language:</p>
                    <ol>
                        <li><strong>Text Preprocessing:</strong> Tokenization, stemming, lemmatization, and stopword removal.</li>
                        <li><strong>Vectorization:</strong> Bag-of-words, TF-IDF, and word embeddings.</li>
                        <li><strong>Modeling:</strong> Text classification, sentiment analysis, and named entity recognition.</li>
                        <li><strong>Advanced NLP:</strong> Transformers, BERT, and transfer learning.</li>
                        <li><strong>Project Work:</strong> Build and deploy an NLP model for a real-world task.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build NLP modeling and deployment skills:</p>
                    <ul>
                        <li>Weekly text processing and modeling exercises.</li>
                        <li>Mini-projects focused on classification and entity extraction.</li>
                        <li>Peer reviews and model interpretation sessions.</li>
                        <li>Capstone project: Build and present an NLP solution for a business or social challenge.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering NLP theory and tools.</li>
                        <li>One lab session for hands-on modeling and deployment.</li>
                        <li>Optional office hours for mentoring and project support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to process and model natural language data using modern NLP techniques. It emphasizes text understanding, classification, and deployment.</p>
                    <p>By the end, students will be able to build NLP applications for real-world use cases.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Process and model text data using NLP techniques.</li>
                        <li>Build applications for sentiment analysis, classification, and entity recognition.</li>
                        <li>Prepare for roles in AI, data science, and language technology.</li>
                        <li>Build a portfolio of NLP projects and applications.</li>
                    </ul>
                ',
                'course_technologies' => 'spaCy, NLTK, Hugging Face Transformers, TensorFlow, Scikit-learn',
                'duration' => '7 Weeks',
            ],

            'Computer Vision Applications' => [
                'basic_requirements' => '
                    <p>Participants should have intermediate Python skills and prior experience with machine learning. Familiarity with NumPy and image formats is helpful.</p>
                    <p>A laptop with OpenCV, TensorFlow, and Jupyter Notebook installed is recommended.</p>
                    <p>This course is ideal for developers and data scientists working with image and video data.</p>
                ',
                'course_outline' => '
                    <p>The course explores techniques for image processing and computer vision modeling:</p>
                    <ol>
                        <li><strong>Image Fundamentals:</strong> Pixels, channels, transformations, and filters.</li>
                        <li><strong>Feature Extraction:</strong> Edge detection, contours, and object localization.</li>
                        <li><strong>Modeling:</strong> Image classification, object detection, and segmentation.</li>
                        <li><strong>Deep Learning Integration:</strong> CNNs, transfer learning, and pre-trained models.</li>
                        <li><strong>Project Work:</strong> Build and deploy a computer vision model for a real-world task.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build image processing and modeling skills:</p>
                    <ul>
                        <li>Weekly image manipulation and modeling exercises.</li>
                        <li>Mini-projects focused on classification and detection.</li>
                        <li>Peer reviews and model interpretation sessions.</li>
                        <li>Capstone project: Build and present a computer vision solution for a business or social challenge.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering computer vision theory and tools.</li>
                        <li>One lab session for hands-on modeling and deployment.</li>
                        <li>Optional office hours for mentoring and project support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to process and model image data using computer vision techniques. It emphasizes feature extraction, deep learning, and deployment.</p>
                    <p>By the end, students will be able to build computer vision applications for real-world use cases.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Process and model image data using computer vision techniques.</li>
                        <li>Build applications for classification, detection, and segmentation.</li>
                        <li>Prepare for roles in AI, robotics, and visual analytics.</li>
                        <li>Build a portfolio of computer vision projects and applications.</li>
                    </ul>
                ',
                'course_technologies' => 'OpenCV, TensorFlow, Keras, NumPy, Matplotlib, Jupyter',
                'duration' => '7 Weeks',
            ],
            'AI Ethics and Responsible Development' => [
                'basic_requirements' => '
                    <p>No technical background is required. Participants should have an interest in technology, ethics, and policy.</p>
                    <p>A laptop with access to reading materials and collaborative tools is recommended.</p>
                    <p>This course is ideal for developers, policymakers, and business leaders shaping AI strategy.</p>
                ',
                'course_outline' => '
                    <p>The course explores ethical frameworks and responsible AI development practices:</p>
                    <ol>
                        <li><strong>Ethical Foundations:</strong> Fairness, accountability, transparency, and privacy.</li>
                        <li><strong>Bias & Discrimination:</strong> Sources, detection, and mitigation strategies.</li>
                        <li><strong>Regulatory Landscape:</strong> Global AI policies, standards, and compliance.</li>
                        <li><strong>Responsible Design:</strong> Human-centered AI, explainability, and safety.</li>
                        <li><strong>Project Work:</strong> Draft an ethical AI policy or audit a model for fairness.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build ethical awareness and strategic thinking:</p>
                    <ul>
                        <li>Weekly case studies and policy analysis exercises.</li>
                        <li>Mini-projects focused on bias detection and ethical audits.</li>
                        <li>Peer discussions and stakeholder role-play sessions.</li>
                        <li>Capstone project: Present a responsible AI framework for a fictional organization.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One seminar-style session covering ethics and policy frameworks.</li>
                        <li>Optional breakout groups for collaborative policy design.</li>
                        <li>Guest lectures from industry experts and ethicists.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to develop and deploy AI responsibly. It emphasizes fairness, transparency, and alignment with human values.</p>
                    <p>By the end, students will be able to advocate for ethical AI practices and contribute to responsible innovation.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand ethical challenges in AI development.</li>
                        <li>Design responsible AI systems and policies.</li>
                        <li>Prepare for roles in AI governance, strategy, and compliance.</li>
                        <li>Build a portfolio of ethical audits and policy frameworks.</li>
                    </ul>
                ',
                'course_technologies' => 'AI Fairness 360, Model Cards, Google PAIR, OECD AI Principles',
                'duration' => '5 Weeks',
            ],
            'AI Capstone Project' => [
                'basic_requirements' => '
                    <p>Participants should have completed foundational AI and ML courses or have equivalent experience in model development and deployment.</p>
                    <p>A laptop with access to Python, ML libraries, and cloud platforms is essential.</p>
                    <p>This course is ideal for learners ready to apply AI skills in a comprehensive project.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through planning and executing a full AI solution:</p>
                    <ol>
                        <li><strong>Project Planning:</strong> Define problem, data sources, and success metrics.</li>
                        <li><strong>Model Development:</strong> Select and train appropriate algorithms.</li>
                        <li><strong>Evaluation & Tuning:</strong> Optimize performance and interpret results.</li>
                        <li><strong>Deployment:</strong> Package model and deploy via API or app.</li>
                        <li><strong>Presentation:</strong> Document and present the complete AI solution.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to integrate AI tools and practices:</p>
                    <ul>
                        <li>Weekly project milestones and deliverables.</li>
                        <li>Peer collaboration and code reviews.</li>
                        <li>Mentoring sessions and architecture critiques.</li>
                        <li>Final presentation: Deliver a fully functional AI solution with documentation.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One project planning session with instructor guidance.</li>
                        <li>Optional labs for implementation and troubleshooting.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply AI principles in a comprehensive project. It emphasizes integration, deployment, and real-world impact.</p>
                    <p>By the end, students will have a complete AI portfolio project ready for employers or clients.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Apply AI tools and practices in a real-world scenario.</li>
                        <li>Demonstrate end-to-end model development and deployment skills.</li>
                        <li>Prepare for advanced roles in AI engineering and data science.</li>
                        <li>Build a showcase portfolio project with documentation and metrics.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, TensorFlow, scikit-learn, Flask, Streamlit, AWS/GCP',
                'duration' => '6 Weeks',
            ],

            'Reinforcement Learning Fundamentals' => [
                'basic_requirements' => '
                    <p>Participants should have a solid understanding of Python and prior experience with machine learning. Familiarity with probability, linear algebra, and calculus is helpful.</p>
                    <p>A laptop with Python, OpenAI Gym, and TensorFlow or PyTorch installed is recommended.</p>
                    <p>This course is ideal for AI developers, researchers, and advanced data scientists.</p>
                ',
                'course_outline' => '
                    <p>The course introduces reinforcement learning (RL) concepts and algorithms:</p>
                    <ol>
                        <li><strong>RL Basics:</strong> Agents, environments, rewards, and policies.</li>
                        <li><strong>Markov Decision Processes:</strong> States, actions, transitions, and value functions.</li>
                        <li><strong>Algorithms:</strong> Q-learning, SARSA, policy gradients, and actor-critic methods.</li>
                        <li><strong>Exploration vs Exploitation:</strong> Epsilon-greedy, softmax, and entropy regularization.</li>
                        <li><strong>Project Work:</strong> Train an agent to solve a simulated environment using RL.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build RL modeling and experimentation skills:</p>
                    <ul>
                        <li>Weekly coding labs and environment simulations.</li>
                        <li>Mini-projects focused on training and tuning RL agents.</li>
                        <li>Peer reviews and algorithm comparisons.</li>
                        <li>Capstone project: Build and present an RL solution for a game or control task.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering RL theory and algorithms.</li>
                        <li>One lab session for hands-on training and evaluation.</li>
                        <li>Optional office hours for mentoring and debugging support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to build intelligent agents using reinforcement learning. It emphasizes exploration strategies, algorithm design, and simulation environments.</p>
                    <p>By the end, students will be able to train RL agents and evaluate their performance in dynamic tasks.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand and implement core RL algorithms.</li>
                        <li>Train agents in simulated environments using OpenAI Gym.</li>
                        <li>Prepare for roles in AI research, robotics, and game development.</li>
                        <li>Build a portfolio of reinforcement learning projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, OpenAI Gym, TensorFlow, PyTorch, NumPy',
                'duration' => '7 Weeks',
            ],
            'AI for Business and Strategy' => [
                'basic_requirements' => '
                    <p>No coding experience is required. Participants should have a background in business, product management, or operations.</p>
                    <p>A laptop with access to productivity tools and case study materials is recommended.</p>
                    <p>This course is ideal for executives, managers, and entrepreneurs exploring AI adoption.</p>
                ',
                'course_outline' => '
                    <p>The course explores how AI can drive business value and competitive advantage:</p>
                    <ol>
                        <li><strong>AI Landscape:</strong> Capabilities, limitations, and industry trends.</li>
                        <li><strong>Use Case Identification:</strong> Process automation, personalization, and decision support.</li>
                        <li><strong>Data Strategy:</strong> Data readiness, governance, and ethical considerations.</li>
                        <li><strong>AI Integration:</strong> Build vs buy, vendor selection, and change management.</li>
                        <li><strong>Project Work:</strong> Develop an AI strategy roadmap for a business scenario.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build strategic thinking and AI fluency:</p>
                    <ul>
                        <li>Weekly case studies and opportunity mapping exercises.</li>
                        <li>Mini-projects focused on ROI analysis and stakeholder alignment.</li>
                        <li>Peer reviews and executive briefings.</li>
                        <li>Capstone project: Present an AI adoption strategy for a real or fictional company.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One seminar-style session covering AI strategy frameworks.</li>
                        <li>Optional workshops for roadmap development and stakeholder engagement.</li>
                        <li>Guest speakers from industry and innovation labs.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to align AI capabilities with business goals. It emphasizes strategic planning, risk management, and value creation.</p>
                    <p>By the end, students will be able to lead AI initiatives and make informed investment decisions.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Identify and evaluate AI opportunities in business contexts.</li>
                        <li>Develop strategic roadmaps for AI adoption.</li>
                        <li>Prepare for leadership roles in digital transformation and innovation.</li>
                        <li>Build a portfolio of AI strategy briefs and presentations.</li>
                    </ul>
                ',
                'course_technologies' => 'AI Canvas, Business Model Canvas, Google Sheets, PowerPoint, Case Studies',
                'duration' => '5 Weeks',
            ],
            'Social Media Marketing' => [
                'basic_requirements' => '
                    <p>No prior marketing experience is required. Participants should be familiar with using social media platforms and basic content creation tools.</p>
                    <p>A laptop or smartphone with access to major platforms like Facebook, Instagram, LinkedIn, and TikTok is recommended.</p>
                    <p>This course is ideal for marketers, influencers, and small business owners.</p>
                ',
                'course_outline' => '
                    <p>The course covers strategies for growing and engaging audiences on social media:</p>
                    <ol>
                        <li><strong>Platform Strategy:</strong> Understanding audience behavior across major platforms.</li>
                        <li><strong>Content Creation:</strong> Visuals, captions, hashtags, and scheduling.</li>
                        <li><strong>Engagement Tactics:</strong> Community building, responding, and influencer collaboration.</li>
                        <li><strong>Paid Social:</strong> Ad formats, targeting, and budget optimization.</li>
                        <li><strong>Analytics & Reporting:</strong> Measuring reach, engagement, and conversions.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build social media strategy and execution skills:</p>
                    <ul>
                        <li>Weekly content planning and engagement challenges.</li>
                        <li>Mini-projects focused on campaign creation and analysis.</li>
                        <li>Peer feedback and platform audits.</li>
                        <li>Capstone project: Launch and report on a multi-platform social media campaign.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering platform strategy and trends.</li>
                        <li>One lab session for content creation and campaign setup.</li>
                        <li>Optional office hours for feedback and analytics review.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to build brand presence and engagement through social media. It emphasizes content strategy, audience targeting, and performance tracking.</p>
                    <p>By the end, students will be able to run effective social media campaigns across multiple platforms.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Grow and engage audiences on social media.</li>
                        <li>Create and manage content across platforms.</li>
                        <li>Prepare for roles in social media and brand marketing.</li>
                        <li>Build a portfolio of social media campaigns and analytics reports.</li>
                    </ul>
                ',
                'course_technologies' => 'Meta Business Suite, Canva, Buffer, TikTok Ads, LinkedIn Campaign Manager',
                'duration' => '5 Weeks',
            ],

            'Generative AI and Prompt Engineering' => [
                'basic_requirements' => '
                    <p>Participants should have basic familiarity with AI concepts and experience using generative tools like ChatGPT, DALL·E, or similar platforms.</p>
                    <p>A laptop with internet access and access to generative AI tools is recommended.</p>
                    <p>This course is ideal for creatives, developers, educators, and product teams exploring generative AI applications.</p>
                ',
                'course_outline' => '
                    <p>The course explores how to design effective prompts and build with generative AI:</p>
                    <ol>
                        <li><strong>Prompt Engineering Basics:</strong> Structure, context, and instruction tuning.</li>
                        <li><strong>Text Generation:</strong> Summarization, rewriting, ideation, and storytelling.</li>
                        <li><strong>Image & Code Generation:</strong> Visual prompts, style control, and code synthesis.</li>
                        <li><strong>Tool Integration:</strong> APIs, workflows, and automation with generative models.</li>
                        <li><strong>Project Work:</strong> Build a generative AI tool or creative application.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build creative and technical prompting skills:</p>
                    <ul>
                        <li>Weekly prompt design and refinement challenges.</li>
                        <li>Mini-projects focused on content generation and tool integration.</li>
                        <li>Peer feedback and prompt optimization sessions.</li>
                        <li>Capstone project: Build and present a generative AI-powered solution.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering prompt design and generative use cases.</li>
                        <li>One lab session for hands-on experimentation and tool building.</li>
                        <li>Optional office hours for feedback and creative support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to harness generative AI through effective prompt engineering. It emphasizes creativity, precision, and tool integration.</p>
                    <p>By the end, students will be able to design prompts and build generative workflows for diverse applications.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master prompt engineering for text, image, and code generation.</li>
                        <li>Build creative tools and workflows using generative AI.</li>
                        <li>Prepare for roles in AI product design, content creation, and automation.</li>
                        <li>Build a portfolio of generative AI projects and prompt libraries.</li>
                    </ul>
                ',
                'course_technologies' => 'ChatGPT, DALL·E, Midjourney, GitHub Copilot, Zapier, OpenAI API',
                'duration' => '6 Weeks',
            ],

            'Product Management Foundations' => [
                'basic_requirements' => '
                    <p>No prior product experience is required. Participants should have an interest in technology, business, or innovation.</p>
                    <p>A laptop with access to productivity tools and collaboration platforms is recommended.</p>
                    <p>This course is ideal for aspiring product managers, entrepreneurs, and cross-functional team leads.</p>
                ',
                'course_outline' => '
                    <p>The course introduces core product management principles and responsibilities:</p>
                    <ol>
                        <li><strong>Role of the PM:</strong> Strategy, execution, and cross-functional leadership.</li>
                        <li><strong>Product Lifecycle:</strong> Discovery, development, launch, and iteration.</li>
                        <li><strong>User Research:</strong> Interviews, surveys, personas, and journey mapping.</li>
                        <li><strong>Roadmapping:</strong> Prioritization, backlog grooming, and stakeholder alignment.</li>
                        <li><strong>Project Work:</strong> Define and present a product concept and roadmap.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build strategic and operational PM skills:</p>
                    <ul>
                        <li>Weekly case studies and product planning exercises.</li>
                        <li>Mini-projects focused on user research and MVP definition.</li>
                        <li>Peer reviews and roadmap critiques.</li>
                        <li>Capstone project: Present a product strategy and roadmap for a fictional solution.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One seminar-style session covering PM frameworks and tools.</li>
                        <li>Optional workshops for roadmap building and stakeholder communication.</li>
                        <li>Guest speakers from product-led organizations.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches the fundamentals of product management. It emphasizes user-centric thinking, strategic planning, and cross-functional collaboration.</p>
                    <p>By the end, students will be able to define product strategies and lead development initiatives.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand the role and responsibilities of a product manager.</li>
                        <li>Develop product strategies and roadmaps.</li>
                        <li>Prepare for PM roles in startups and enterprises.</li>
                        <li>Build a portfolio of product planning artifacts.</li>
                    </ul>
                ',
                'course_technologies' => 'Miro, Trello, Productboard, Google Docs, Figma',
                'duration' => '5 Weeks',
            ],

            'Agile Product Development' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of product development or project management. Familiarity with Agile principles is helpful but not required.</p>
                    <p>A laptop with access to Agile tools like Jira or Trello is recommended.</p>
                    <p>This course is ideal for PMs, Scrum Masters, and product teams building iterative solutions.</p>
                ',
                'course_outline' => '
                    <p>The course explores Agile methodologies for product development:</p>
                    <ol>
                        <li><strong>Agile Principles:</strong> Iteration, feedback, and continuous improvement.</li>
                        <li><strong>Scrum Framework:</strong> Roles, ceremonies, and artifacts.</li>
                        <li><strong>Kanban & Lean:</strong> Flow optimization and work-in-progress limits.</li>
                        <li><strong>Backlog Management:</strong> User stories, epics, and prioritization techniques.</li>
                        <li><strong>Project Work:</strong> Plan and simulate an Agile sprint cycle.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build Agile planning and execution skills:</p>
                    <ul>
                        <li>Weekly sprint planning and retrospective exercises.</li>
                        <li>Mini-projects focused on backlog grooming and velocity tracking.</li>
                        <li>Peer reviews and Agile coaching sessions.</li>
                        <li>Capstone project: Run a simulated Agile sprint and present outcomes.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Agile theory and frameworks.</li>
                        <li>One lab session for sprint simulation and backlog management.</li>
                        <li>Optional office hours for coaching and team facilitation.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to manage product development using Agile methodologies. It emphasizes collaboration, adaptability, and iterative delivery.</p>
                    <p>By the end, students will be able to lead Agile teams and optimize product workflows.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master Agile frameworks like Scrum and Kanban.</li>
                        <li>Plan and execute iterative product development cycles.</li>
                        <li>Prepare for roles in Agile product management and team leadership.</li>
                        <li>Build a portfolio of Agile planning artifacts and sprint reports.</li>
                    </ul>
                ',
                'course_technologies' => 'Jira, Trello, Miro, Confluence, Google Sheets',
                'duration' => '6 Weeks',
            ],

            'User Research and Validation' => [
                'basic_requirements' => '
                    <p>No prior research experience is required. Participants should have an interest in user-centered design and product discovery.</p>
                    <p>A laptop with access to survey tools and collaboration platforms is recommended.</p>
                    <p>This course is ideal for PMs, designers, and entrepreneurs validating product ideas.</p>
                ',
                'course_outline' => '
                    <p>The course covers techniques for understanding user needs and validating product concepts:</p>
                    <ol>
                        <li><strong>Research Planning:</strong> Objectives, hypotheses, and recruitment.</li>
                        <li><strong>Qualitative Methods:</strong> Interviews, usability testing, and field studies.</li>
                        <li><strong>Quantitative Methods:</strong> Surveys, analytics, and A/B testing.</li>
                        <li><strong>Insight Synthesis:</strong> Affinity mapping, personas, and journey maps.</li>
                        <li><strong>Project Work:</strong> Conduct and present a user research study.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build research and validation skills:</p>
                    <ul>
                        <li>Weekly interview and survey design exercises.</li>
                        <li>Mini-projects focused on usability testing and insight synthesis.</li>
                        <li>Peer reviews and research critique sessions.</li>
                        <li>Capstone project: Present a validated product concept based on user research.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering research methods and tools.</li>
                        <li>One workshop session for study design and analysis.</li>
                        <li>Optional office hours for feedback and synthesis support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to conduct user research and validate product ideas. It emphasizes empathy, rigor, and actionable insights.</p>
                    <p>By the end, students will be able to design and execute research studies that inform product decisions.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Conduct qualitative and quantitative user research.</li>
                        <li>Generate insights to guide product strategy.</li>
                        <li>Prepare for roles in product discovery and UX research.</li>
                        <li>Build a portfolio of research plans and validation reports.</li>
                    </ul>
                ',
                'course_technologies' => 'Typeform, Google Forms, Lookback, Miro, Hotjar',
                'duration' => '5 Weeks',
            ],

            'Product Strategy Capstone' => [
                'basic_requirements' => '
                    <p>Participants should have completed foundational product management and strategy courses or have equivalent experience in product planning and execution.</p>
                    <p>A laptop with access to collaboration and presentation tools is essential.</p>
                    <p>This course is ideal for learners ready to synthesize their product knowledge into a strategic portfolio project.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through the creation of a comprehensive product strategy:</p>
                    <ol>
                        <li><strong>Problem Discovery:</strong> Identify user needs and market opportunities.</li>
                        <li><strong>Solution Design:</strong> Define MVP, roadmap, and success metrics.</li>
                        <li><strong>Business Model:</strong> Pricing, revenue, and growth strategy.</li>
                        <li><strong>Stakeholder Alignment:</strong> Communication, buy-in, and cross-functional planning.</li>
                        <li><strong>Presentation:</strong> Deliver a full product strategy pitch deck.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to integrate product strategy tools and thinking:</p>
                    <ul>
                        <li>Weekly milestones and strategic deliverables.</li>
                        <li>Peer collaboration and feedback sessions.</li>
                        <li>Mentoring and pitch coaching.</li>
                        <li>Final presentation: Deliver a product strategy pitch to a panel of instructors or peers.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional strategy labs:</p>
                    <ul>
                        <li>One planning session with instructor guidance.</li>
                        <li>Optional labs for pitch development and stakeholder mapping.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply product strategy frameworks in a real-world scenario. It emphasizes vision, execution, and storytelling.</p>
                    <p>By the end, students will have a complete product strategy portfolio piece and presentation-ready pitch.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Apply product strategy tools in a comprehensive project.</li>
                        <li>Demonstrate leadership in product planning and communication.</li>
                        <li>Prepare for senior PM and strategy roles.</li>
                        <li>Build a showcase portfolio and pitch deck.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Slides, Miro, Figma, Notion, Loom',
                'duration' => '6 Weeks',
            ],
            'Go-to-Market Strategy' => [
                'basic_requirements' => '
                    <p>No prior marketing or product launch experience is required. Participants should have an interest in business strategy and customer acquisition.</p>
                    <p>A laptop with access to planning and collaboration tools is recommended.</p>
                    <p>This course is ideal for PMs, marketers, and founders preparing to launch new products.</p>
                ',
                'course_outline' => '
                    <p>The course covers how to plan and execute a successful product launch:</p>
                    <ol>
                        <li><strong>Market Research:</strong> TAM/SAM/SOM, competitive analysis, and positioning.</li>
                        <li><strong>Customer Segmentation:</strong> Personas, pain points, and value propositions.</li>
                        <li><strong>Channel Strategy:</strong> Sales, partnerships, and digital marketing.</li>
                        <li><strong>Launch Planning:</strong> Messaging, timelines, and cross-functional coordination.</li>
                        <li><strong>Project Work:</strong> Develop and present a GTM plan for a product concept.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build strategic launch planning skills:</p>
                    <ul>
                        <li>Weekly GTM planning and messaging exercises.</li>
                        <li>Mini-projects focused on positioning and channel selection.</li>
                        <li>Peer reviews and launch critique sessions.</li>
                        <li>Capstone project: Present a go-to-market strategy for a real or fictional product.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering GTM frameworks and case studies.</li>
                        <li>Optional workshops for messaging and launch planning.</li>
                        <li>Guest speakers from product marketing and sales teams.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to bring products to market successfully. It emphasizes positioning, coordination, and customer alignment.</p>
                    <p>By the end, students will be able to craft and execute GTM strategies that drive adoption and growth.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Plan and execute go-to-market strategies.</li>
                        <li>Align product, marketing, and sales teams around launch goals.</li>
                        <li>Prepare for roles in product marketing and strategic planning.</li>
                        <li>Build a portfolio of GTM plans and positioning briefs.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Slides, Miro, HubSpot, Canva, Trello',
                'duration' => '5 Weeks',
            ],
            'Metrics and Product Analytics' => [
                'basic_requirements' => '
                    <p>Participants should have a basic understanding of product development and user behavior. Familiarity with spreadsheets or analytics tools is helpful.</p>
                    <p>A laptop with access to Google Analytics, Mixpanel, or Amplitude is recommended.</p>
                    <p>This course is ideal for PMs, analysts, and growth teams focused on data-driven decision-making.</p>
                ',
                'course_outline' => '
                    <p>The course covers how to define, track, and interpret product metrics:</p>
                    <ol>
                        <li><strong>North Star Metrics:</strong> Defining success and aligning teams.</li>
                        <li><strong>Behavioral Analytics:</strong> Funnels, cohorts, retention, and engagement.</li>
                        <li><strong>Experimentation:</strong> A/B testing, hypothesis design, and statistical significance.</li>
                        <li><strong>Dashboards & Reporting:</strong> Visualization, storytelling, and stakeholder communication.</li>
                        <li><strong>Project Work:</strong> Analyze product data and present actionable insights.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build analytical and strategic thinking:</p>
                    <ul>
                        <li>Weekly metric definition and dashboard exercises.</li>
                        <li>Mini-projects focused on funnel analysis and retention curves.</li>
                        <li>Peer reviews and insight critique sessions.</li>
                        <li>Capstone project: Present a product analytics report with recommendations.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering metrics frameworks and tools.</li>
                        <li>One lab session for hands-on analysis and visualization.</li>
                        <li>Optional office hours for mentoring and data support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use data to guide product decisions. It emphasizes clarity, experimentation, and impact measurement.</p>
                    <p>By the end, students will be able to define KPIs, run experiments, and communicate insights effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Define and track meaningful product metrics.</li>
                        <li>Analyze user behavior and product performance.</li>
                        <li>Prepare for roles in product analytics and growth strategy.</li>
                        <li>Build a portfolio of dashboards and analytics reports.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Analytics, Mixpanel, Amplitude, Looker Studio, Excel',
                'duration' => '6 Weeks',
            ],

            'Creative Coding with p5.js' => [
                'basic_requirements' => '
                    <p>No prior coding experience is required. Participants should be curious about art, design, and interactivity.</p>
                    <p>A laptop with internet access and a modern browser is recommended. All coding is done in-browser using the p5.js web editor.</p>
                    <p>This course is ideal for artists, designers, and educators exploring generative visuals and interactive sketches.</p>
                ',
                'course_outline' => '
                    <p>The course introduces creative coding using the p5.js JavaScript library:</p>
                    <ol>
                        <li><strong>Drawing & Animation:</strong> Shapes, colors, motion, and frame rate.</li>
                        <li><strong>Interactivity:</strong> Mouse, keyboard, and touch input.</li>
                        <li><strong>Generative Design:</strong> Randomness, noise, and algorithmic patterns.</li>
                        <li><strong>Media Integration:</strong> Sound, video, and image manipulation.</li>
                        <li><strong>Project Work:</strong> Create an interactive art piece or generative sketch.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build creative and technical fluency:</p>
                    <ul>
                        <li>Weekly sketching challenges and code walkthroughs.</li>
                        <li>Mini-projects focused on interactivity and generative design.</li>
                        <li>Peer critiques and creative showcases.</li>
                        <li>Capstone project: Present a polished creative coding piece with documentation.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering creative coding concepts and demos.</li>
                        <li>One lab session for sketch development and experimentation.</li>
                        <li>Optional office hours for feedback and debugging support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to express ideas through code using p5.js. It emphasizes playfulness, experimentation, and visual storytelling.</p>
                    <p>By the end, students will be able to create interactive sketches and generative art projects.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn creative coding with p5.js and JavaScript.</li>
                        <li>Create interactive and generative visual experiences.</li>
                        <li>Prepare for roles in media art, design, and education.</li>
                        <li>Build a portfolio of creative coding projects.</li>
                    </ul>
                ',
                'course_technologies' => 'p5.js, JavaScript, Web Editor, GitHub Pages',
                'duration' => '6 Weeks',
            ],
            'Interaction Design Fundamentals' => [
                'basic_requirements' => '
                    <p>No prior design or coding experience is required. Participants should be interested in user experience and digital interfaces.</p>
                    <p>A laptop with access to design tools like Figma or Adobe XD is recommended.</p>
                    <p>This course is ideal for designers, developers, and product teams focused on usability and interaction.</p>
                ',
                'course_outline' => '
                    <p>The course explores principles and practices of interaction design:</p>
                    <ol>
                        <li><strong>Design Principles:</strong> Affordances, feedback, constraints, and consistency.</li>
                        <li><strong>Interface Patterns:</strong> Navigation, forms, buttons, and microinteractions.</li>
                        <li><strong>Prototyping:</strong> Wireframes, flows, and interactive mockups.</li>
                        <li><strong>Usability Testing:</strong> Heuristics, observation, and iteration.</li>
                        <li><strong>Project Work:</strong> Design and test an interactive interface for a digital product.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build intuitive and user-centered design skills:</p>
                    <ul>
                        <li>Weekly design challenges and usability critiques.</li>
                        <li>Mini-projects focused on interface components and flows.</li>
                        <li>Peer feedback and testing sessions.</li>
                        <li>Capstone project: Present a refined interactive prototype with user insights.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering interaction design theory and examples.</li>
                        <li>One workshop session for prototyping and testing.</li>
                        <li>Optional office hours for feedback and iteration support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to design intuitive and engaging digital interactions. It emphasizes usability, feedback, and user-centered design.</p>
                    <p>By the end, students will be able to create and test interactive prototypes that solve real user problems.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master interaction design principles and patterns.</li>
                        <li>Build and test interactive prototypes.</li>
                        <li>Prepare for roles in UX, UI, and product design.</li>
                        <li>Build a portfolio of interaction design projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Adobe XD, InVision, Miro, Maze',
                'duration' => '5 Weeks',
            ],

            'Physical Computing with Arduino' => [
                'basic_requirements' => '
                    <p>No prior electronics experience is required. Participants should be comfortable using a computer and curious about hardware and interactivity.</p>
                    <p>A laptop with the Arduino IDE installed and access to a basic Arduino kit is recommended.</p>
                    <p>This course is ideal for artists, designers, and makers exploring interactive hardware projects.</p>
                ',
                'course_outline' => '
                    <p>The course introduces physical computing using Arduino microcontrollers:</p>
                    <ol>
                        <li><strong>Electronics Basics:</strong> Circuits, sensors, actuators, and breadboarding.</li>
                        <li><strong>Arduino Programming:</strong> Digital/analog I/O, loops, and conditionals.</li>
                        <li><strong>Interactive Systems:</strong> Buttons, LEDs, motors, and sound.</li>
                        <li><strong>Serial Communication:</strong> Connecting Arduino to software and visual interfaces.</li>
                        <li><strong>Project Work:</strong> Build an interactive installation or kinetic sculpture.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build hands-on prototyping and coding skills:</p>
                    <ul>
                        <li>Weekly circuit-building and sketch programming exercises.</li>
                        <li>Mini-projects focused on sensor-based interaction and feedback.</li>
                        <li>Peer demos and critique sessions.</li>
                        <li>Capstone project: Present a physical computing prototype with documentation and video demo.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering electronics and Arduino concepts.</li>
                        <li>One lab session for building and testing circuits.</li>
                        <li>Optional office hours for troubleshooting and project support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to create interactive physical systems using Arduino. It emphasizes experimentation, play, and tangible interaction.</p>
                    <p>By the end, students will be able to build responsive hardware projects that bridge the digital and physical worlds.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Learn electronics and programming through hands-on projects.</li>
                        <li>Build interactive installations and kinetic artworks.</li>
                        <li>Prepare for roles in creative tech, IoT, and experience design.</li>
                        <li>Build a portfolio of physical computing prototypes.</li>
                    </ul>
                ',
                'course_technologies' => 'Arduino, C++, Sensors, LEDs, Servo Motors, Processing',
                'duration' => '6 Weeks',
            ],
            'Generative Art and Algorithms' => [
                'basic_requirements' => '
                    <pParticipants should have basic coding experience in any language. Familiarity with creative tools or visual design is helpful.</p>
                    <p>A laptop with access to creative coding environments like Processing, p5.js, or Python is recommended.</p>
                    <p>This course is ideal for artists, designers, and technologists exploring algorithmic creativity.</p>
                ',
                'course_outline' => '
                    <p>The course explores how algorithms can be used to create art:</p>
                    <ol>
                        <li><strong>Generative Principles:</strong> Rules, randomness, recursion, and emergence.</li>
                        <li><strong>Algorithmic Techniques:</strong> L-systems, cellular automata, noise, and fractals.</li>
                        <li><strong>Creative Coding Tools:</strong> Processing, p5.js, and Python libraries.</li>
                        <li><strong>Visual Composition:</strong> Color, form, motion, and layering.</li>
                        <li><strong>Project Work:</strong> Create a generative art series or interactive installation.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build algorithmic thinking and visual experimentation:</p>
                    <ul>
                        <li>Weekly algorithm design and sketching exercises.</li>
                        <li>Mini-projects focused on generative systems and visual aesthetics.</li>
                        <li>Peer critiques and creative showcases.</li>
                        <li>Capstone project: Present a generative art portfolio with process documentation.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering generative theory and techniques.</li>
                        <li>One lab session for coding and visual experimentation.</li>
                        <li>Optional office hours for feedback and creative support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use algorithms to generate visual art. It emphasizes creativity, complexity, and computational aesthetics.</p>
                    <p>By the end, students will be able to design generative systems and produce algorithmic artworks.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Explore generative art through code and algorithms.</li>
                        <li>Build interactive and evolving visual systems.</li>
                        <li>Prepare for roles in media art, creative tech, and design innovation.</li>
                        <li>Build a portfolio of generative art projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Processing, p5.js, Python, Turtle, OpenFrameworks',
                'duration' => '6 Weeks',
            ],

            'Web-Based Interactive Media' => [
                'basic_requirements' => '
                    <p>Participants should have basic HTML/CSS knowledge and an interest in interactive storytelling or digital art. JavaScript experience is helpful but not required.</p>
                    <p>A laptop with a modern browser and code editor (e.g., VS Code) is recommended.</p>
                    <p>This course is ideal for designers, artists, and developers creating interactive web experiences.</p>
                ',
                'course_outline' => '
                    <p>The course explores how to build interactive media using web technologies:</p>
                    <ol>
                        <li><strong>Web Foundations:</strong> HTML, CSS, and JavaScript basics.</li>
                        <li><strong>Interactivity:</strong> DOM manipulation, event listeners, and animations.</li>
                        <li><strong>Media Integration:</strong> Audio, video, and canvas-based visuals.</li>
                        <li><strong>Responsive Design:</strong> Layouts, breakpoints, and accessibility.</li>
                        <li><strong>Project Work:</strong> Build an interactive web experience or digital story.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build web development and creative interaction skills:</p>
                    <ul>
                        <li>Weekly coding challenges and media integration tasks.</li>
                        <li>Mini-projects focused on interactive storytelling and responsive design.</li>
                        <li>Peer critiques and usability testing sessions.</li>
                        <li>Capstone project: Launch a web-based interactive experience with documentation.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering web interaction theory and demos.</li>
                        <li>One lab session for coding and design implementation.</li>
                        <li>Optional office hours for debugging and creative support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to create interactive media using web technologies. It emphasizes storytelling, user engagement, and responsive design.</p>
                    <p>By the end, students will be able to build immersive web experiences that combine code and creativity.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design and code interactive web experiences.</li>
                        <li>Integrate multimedia and responsive layouts.</li>
                        <li>Prepare for roles in web design, creative tech, and digital storytelling.</li>
                        <li>Build a portfolio of interactive web projects.</li>
                    </ul>
                ',
                'course_technologies' => 'HTML, CSS, JavaScript, GSAP, Web Audio API, p5.js',
                'duration' => '6 Weeks',
            ],

            'Creative Coding Capstone' => [
                'basic_requirements' => '
                    <p>Participants should have completed at least one creative coding or interaction design course. Familiarity with p5.js, Processing, or similar tools is expected.</p>
                    <p>A laptop with access to creative coding environments and version control tools is essential.</p>
                    <p>This course is ideal for learners ready to showcase their creative coding skills in a final project.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through the development of a polished creative coding project:</p>
                    <ol>
                        <li><strong>Concept Development:</strong> Ideation, sketching, and creative direction.</li>
                        <li><strong>Technical Planning:</strong> Architecture, tools, and interaction design.</li>
                        <li><strong>Implementation:</strong> Coding, iteration, and debugging.</li>
                        <li><strong>Presentation:</strong> Documentation, storytelling, and public sharing.</li>
                        <li><strong>Showcase:</strong> Present the final project in a virtual or physical exhibition.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to support independent creative development:</p>
                    <ul>
                        <li>Weekly project milestones and critique sessions.</li>
                        <li>Peer collaboration and feedback loops.</li>
                        <li>Mentoring and technical support check-ins.</li>
                        <li>Final presentation: Exhibit a complete creative coding project with artist statement.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One project planning session with instructor feedback.</li>
                        <li>Optional labs for coding, testing, and refinement.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply creative coding skills in a self-directed project. It emphasizes originality, polish, and public presentation.</p>
                    <p>By the end, students will have a portfolio-ready creative coding piece and documentation.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Develop and present a complete creative coding project.</li>
                        <li>Demonstrate technical and artistic fluency.</li>
                        <li>Prepare for roles in creative tech, media art, and interactive design.</li>
                        <li>Build a showcase portfolio and artist statement.</li>
                    </ul>
                ',
                'course_technologies' => 'p5.js, Processing, WebGL, GitHub, OBS Studio',
                'duration' => '6 Weeks',
            ],

            'Startup Ideation and Validation' => [
                'basic_requirements' => '
                    <p>No prior startup experience is required. Participants should be passionate about solving problems and exploring new ideas.</p>
                    <p>A laptop with access to collaboration and research tools is recommended.</p>
                    <p>This course is ideal for aspiring founders, innovators, and product builders.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through generating and validating startup ideas:</p>
                    <ol>
                        <li><strong>Problem Discovery:</strong> Pain points, market gaps, and user interviews.</li>
                        <li><strong>Idea Generation:</strong> Brainstorming, synthesis, and opportunity mapping.</li>
                        <li><strong>Validation Techniques:</strong> Surveys, MVPs, landing pages, and early traction.</li>
                        <li><strong>Competitive Analysis:</strong> Differentiation, positioning, and market sizing.</li>
                        <li><strong>Project Work:</strong> Validate a startup idea and present findings.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build entrepreneurial thinking and validation skills:</p>
                    <ul>
                        <li>Weekly ideation and research challenges.</li>
                        <li>Mini-projects focused on MVP testing and feedback collection.</li>
                        <li>Peer reviews and pitch critiques.</li>
                        <li>Capstone project: Present a validated startup concept with user insights.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One workshop session for ideation and validation planning.</li>
                        <li>Optional labs for MVP building and user testing.</li>
                        <li>Guest speakers from startup founders and incubators.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to generate and validate startup ideas. It emphasizes user-centric thinking, experimentation, and early traction.</p>
                    <p>By the end, students will be able to identify viable startup opportunities and test them effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Generate and validate startup ideas with real users.</li>
                        <li>Build MVPs and collect actionable feedback.</li>
                        <li>Prepare for accelerator programs and early-stage funding.</li>
                        <li>Build a portfolio of validated startup concepts.</li>
                    </ul>
                ',
                'course_technologies' => 'Typeform, Carrd, Google Forms, Figma, Airtable',
                'duration' => '5 Weeks',
            ],

            'Lean Startup and MVP Design' => [
                'basic_requirements' => '
                    <p>Participants should have a startup idea or interest in rapid product development. Familiarity with basic design or prototyping tools is helpful.</p>
                    <p>A laptop with access to MVP building platforms is recommended.</p>
                    <p>This course is ideal for founders, product managers, and startup teams.</p>
                ',
                'course_outline' => '
                    <p>The course explores lean startup principles and MVP development:</p>
                    <ol>
                        <li><strong>Lean Methodology:</strong> Build-measure-learn loop and validated learning.</li>
                        <li><strong>MVP Strategy:</strong> Feature prioritization, scope definition, and rapid prototyping.</li>
                        <li><strong>Testing & Feedback:</strong> User interviews, analytics, and iteration cycles.</li>
                        <li><strong>Pivot or Persevere:</strong> Decision-making and roadmap adjustments.</li>
                        <li><strong>Project Work:</strong> Build and test an MVP for a startup concept.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build rapid prototyping and lean execution skills:</p>
                    <ul>
                        <li>Weekly MVP building and testing exercises.</li>
                        <li>Mini-projects focused on feature scoping and iteration.</li>
                        <li>Peer reviews and usability critiques.</li>
                        <li>Capstone project: Launch and evaluate an MVP with user feedback.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering lean startup theory and case studies.</li>
                        <li>One lab session for MVP building and testing.</li>
                        <li>Optional office hours for mentoring and iteration support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to build and test MVPs using lean startup principles. It emphasizes speed, feedback, and adaptability.</p>
                    <p>By the end, students will be able to launch MVPs and iterate based on real user data.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Apply lean startup principles to product development.</li>
                        <li>Build and test MVPs with real users.</li>
                        <li>Prepare for early-stage product launches and pivots.</li>
                        <li>Build a portfolio of MVPs and iteration reports.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Bubble, Glide, Notion, Google Analytics',
                'duration' => '6 Weeks',
            ],

            'Startup Finance and Fundraising' => [
                'basic_requirements' => '
                    <p>No finance background is required. Participants should be interested in startup economics and funding strategies.</p>
                    <p>A laptop with access to spreadsheets and pitch deck tools is recommended.</p>
                    <p>This course is ideal for founders, operators, and anyone preparing to raise capital.</p>
                ',
                'course_outline' => '
                    <p>The course covers startup financial planning and fundraising fundamentals:</p>
                    <ol>
                        <li><strong>Startup Economics:</strong> Revenue models, unit economics, and burn rate.</li>
                        <li><strong>Financial Modeling:</strong> Forecasting, runway, and scenario planning.</li>
                        <li><strong>Fundraising Strategy:</strong> Investor types, rounds, and pitch preparation.</li>
                        <li><strong>Term Sheets & Cap Tables:</strong> Equity, dilution, and negotiation basics.</li>
                        <li><strong>Project Work:</strong> Build a financial model and pitch deck for a startup concept.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build financial literacy and fundraising readiness:</p>
                    <ul>
                        <li>Weekly modeling and fundraising exercises.</li>
                        <li>Mini-projects focused on pitch deck development and investor targeting.</li>
                        <li>Peer reviews and mock pitch sessions.</li>
                        <li>Capstone project: Present a financial model and investor pitch for a startup.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering startup finance and fundraising strategy.</li>
                        <li>Optional workshops for pitch deck building and financial modeling.</li>
                        <li>Guest speakers from venture capital and startup finance.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to manage startup finances and prepare for fundraising. It emphasizes clarity, strategy, and investor communication.</p>
                    <p>By the end, students will be able to build financial models and pitch decks that attract investment.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Understand startup economics and financial planning.</li>
                        <li>Build investor-ready pitch decks and models.</li>
                        <li>Prepare for fundraising conversations and negotiations.</li>
                        <li>Build a portfolio of financial and fundraising artifacts.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Sheets, Pitch, Canva, DocSend, Cap Table Templates',
                'duration' => '6 Weeks',
            ],
            'Pitching and Storytelling for Founders' => [
                'basic_requirements' => '
                    <p>No public speaking experience is required. Participants should have a startup idea or interest in communicating innovation clearly.</p>
                    <p>A laptop with access to presentation tools and video recording software is recommended.</p>
                    <p>This course is ideal for founders, innovators, and product leaders preparing to pitch ideas to investors, partners, or customers.</p>
                ',
                'course_outline' => '
                    <p>The course teaches how to craft compelling startup pitches and narratives:</p>
                    <ol>
                        <li><strong>Pitch Structure:</strong> Problem, solution, market, traction, team, and ask.</li>
                        <li><strong>Storytelling Techniques:</strong> Emotional hooks, clarity, and narrative flow.</li>
                        <li><strong>Visual Design:</strong> Slide layout, branding, and visual hierarchy.</li>
                        <li><strong>Delivery Skills:</strong> Voice, body language, and confidence.</li>
                        <li><strong>Project Work:</strong> Create and deliver a startup pitch with feedback and iteration.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build storytelling and presentation skills:</p>
                    <ul>
                        <li>Weekly pitch writing and delivery exercises.</li>
                        <li>Mini-projects focused on slide design and narrative refinement.</li>
                        <li>Peer reviews and mock pitch sessions.</li>
                        <li>Capstone project: Deliver a recorded or live pitch with supporting materials.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One workshop session for pitch development and storytelling practice.</li>
                        <li>Optional labs for slide design and delivery coaching.</li>
                        <li>Final showcase with peer and instructor feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to pitch startup ideas with clarity and impact. It emphasizes storytelling, structure, and delivery.</p>
                    <p>By the end, students will be able to confidently present their ideas to investors, partners, and customers.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Craft compelling startup pitches and narratives.</li>
                        <li>Design effective pitch decks and visual materials.</li>
                        <li>Prepare for demo days, investor meetings, and public presentations.</li>
                        <li>Build a portfolio of pitch decks and recorded presentations.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Slides, Canva, Loom, OBS Studio, Notion',
                'duration' => '5 Weeks',
            ],
            'Startup Operations and Growth' => [
                'basic_requirements' => '
                    <p>Participants should have a startup concept or interest in scaling new ventures. Familiarity with basic business tools is helpful.</p>
                    <p>A laptop with access to productivity and analytics platforms is recommended.</p>
                    <p>This course is ideal for founders, operators, and growth leads managing early-stage startups.</p>
                ',
                'course_outline' => '
                    <p>The course covers startup operations and growth strategy:</p>
                    <ol>
                        <li><strong>Operational Foundations:</strong> Team structure, tools, and workflows.</li>
                        <li><strong>Customer Acquisition:</strong> Funnels, channels, and conversion optimization.</li>
                        <li><strong>Retention & Engagement:</strong> Lifecycle marketing and product-led growth.</li>
                        <li><strong>Growth Metrics:</strong> CAC, LTV, churn, and virality.</li>
                        <li><strong>Project Work:</strong> Build a growth strategy and operational plan for a startup.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build operational and growth execution skills:</p>
                    <ul>
                        <li>Weekly growth experiments and funnel analysis.</li>
                        <li>Mini-projects focused on retention and engagement strategies.</li>
                        <li>Peer reviews and growth critiques.</li>
                        <li>Capstone project: Present a startup growth and operations strategy with KPIs.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering growth frameworks and operational tools.</li>
                        <li>One lab session for strategy building and KPI tracking.</li>
                        <li>Optional office hours for mentoring and growth coaching.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to build scalable startup operations and drive growth. It emphasizes experimentation, metrics, and customer-centric execution.</p>
                    <p>By the end, students will be able to manage startup operations and design growth strategies that scale.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design and manage startup operations and growth plans.</li>
                        <li>Track and optimize key performance metrics.</li>
                        <li>Prepare for roles in startup operations, growth, and strategy.</li>
                        <li>Build a portfolio of growth experiments and operational frameworks.</li>
                    </ul>
                ',
                'course_technologies' => 'Airtable, Notion, Mixpanel, Google Analytics, HubSpot',
                'duration' => '6 Weeks',
            ],
            'Startup Capstone: Build and Launch' => [
                'basic_requirements' => '
                    <p>Participants should have completed prior startup courses or have a validated business idea. Experience with MVPs or pitch decks is expected.</p>
                    <p>A laptop with access to prototyping, analytics, and collaboration tools is essential.</p>
                    <p>This course is ideal for founders ready to launch and showcase their startup.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through building and launching a startup:</p>
                    <ol>
                        <li><strong>Launch Planning:</strong> Timeline, team roles, and risk mitigation.</li>
                        <li><strong>Execution:</strong> MVP finalization, marketing, and customer onboarding.</li>
                        <li><strong>Growth Tracking:</strong> Analytics, feedback loops, and iteration.</li>
                        <li><strong>Investor Readiness:</strong> Pitch refinement and fundraising strategy.</li>
                        <li><strong>Showcase:</strong> Present the startup in a demo day or virtual exhibition.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to support launch execution and investor readiness:</p>
                    <ul>
                        <li>Weekly launch milestones and deliverables.</li>
                        <li>Peer collaboration and feedback sessions.</li>
                        <li>Mentoring and pitch coaching.</li>
                        <li>Final presentation: Launch and present a startup with supporting materials.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One planning session with instructor guidance.</li>
                        <li>Optional labs for MVP refinement and pitch preparation.</li>
                        <li>Final demo day and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to launch a startup and present it to the world. It emphasizes execution, storytelling, and investor readiness.</p>
                    <p>By the end, students will have a launched product, pitch deck, and growth strategy ready for real-world traction.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Launch a startup and present it publicly.</li>
                        <li>Demonstrate product, pitch, and growth readiness.</li>
                        <li>Prepare for accelerators, fundraising, and customer acquisition.</li>
                        <li>Build a showcase portfolio and investor pitch deck.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Bubble, Notion, Google Slides, Loom, Stripe',
                'duration' => '6 Weeks',
            ],

            'Storytelling for Digital Media' => [
                'basic_requirements' => '
                    <p>No prior writing or media experience is required. Participants should be interested in narrative, creativity, and digital platforms.</p>
                    <p>A laptop with access to writing and presentation tools is recommended.</p>
                    <p>This course is ideal for creators, marketers, educators, and entrepreneurs crafting stories for digital audiences.</p>
                ',
                'course_outline' => '
                    <p>The course explores narrative techniques and formats for digital storytelling:</p>
                    <ol>
                        <li><strong>Story Structure:</strong> Characters, conflict, resolution, and emotional arcs.</li>
                        <li><strong>Digital Formats:</strong> Blogs, podcasts, videos, social media, and interactive stories.</li>
                        <li><strong>Audience Engagement:</strong> Tone, pacing, and platform-specific storytelling.</li>
                        <li><strong>Visual Storytelling:</strong> Imagery, layout, and multimedia integration.</li>
                        <li><strong>Project Work:</strong> Create and publish a digital story using chosen format and platform.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build narrative and media fluency:</p>
                    <ul>
                        <li>Weekly storytelling challenges and format experiments.</li>
                        <li>Mini-projects focused on character development and audience targeting.</li>
                        <li>Peer reviews and story critique sessions.</li>
                        <li>Capstone project: Publish a digital story with supporting visuals and engagement strategy.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering storytelling theory and examples.</li>
                        <li>One workshop session for writing and media planning.</li>
                        <li>Optional office hours for feedback and editing support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to craft compelling stories for digital platforms. It emphasizes structure, creativity, and audience connection.</p>
                    <p>By the end, students will be able to write and publish engaging digital narratives.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Master storytelling techniques for digital media.</li>
                        <li>Create content for blogs, podcasts, videos, and social platforms.</li>
                        <li>Prepare for roles in content creation, marketing, and education.</li>
                        <li>Build a portfolio of published digital stories.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Docs, Canva, Medium, Anchor, Instagram',
                'duration' => '5 Weeks',
            ],

            'Podcast Production and Editing' => [
                'basic_requirements' => '
                    <p>No prior audio experience is required. Participants should be comfortable using a computer and interested in voice-based storytelling.</p>
                    <p>A laptop with access to audio recording and editing software is recommended.</p>
                    <p>This course is ideal for creators, educators, and marketers producing podcasts or audio content.</p>
                ',
                'course_outline' => '
                    <p>The course covers podcast planning, recording, and post-production:</p>
                    <ol>
                        <li><strong>Podcast Formats:</strong> Interviews, solo shows, storytelling, and panel discussions.</li>
                        <li><strong>Recording Techniques:</strong> Microphones, acoustics, and voice performance.</li>
                        <li><strong>Editing & Mixing:</strong> Audio cleanup, transitions, and sound design.</li>
                        <li><strong>Publishing & Promotion:</strong> Hosting platforms, RSS feeds, and audience growth.</li>
                        <li><strong>Project Work:</strong> Produce and publish a podcast episode with intro, outro, and show notes.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build audio production and storytelling skills:</p>
                    <ul>
                        <li>Weekly recording and editing exercises.</li>
                        <li>Mini-projects focused on format experimentation and voice performance.</li>
                        <li>Peer reviews and sound critiques.</li>
                        <li>Capstone project: Publish a podcast episode with full production workflow.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering podcast theory and tools.</li>
                        <li>One lab session for recording and editing practice.</li>
                        <li>Optional office hours for technical support and feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to produce and edit podcasts from concept to publication. It emphasizes storytelling, sound quality, and audience engagement.</p>
                    <p>By the end, students will be able to publish polished podcast episodes and grow their audience.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Plan, record, and edit podcast episodes.</li>
                        <li>Use audio tools for mixing and sound design.</li>
                        <li>Prepare for roles in media, education, and branded content.</li>
                        <li>Build a portfolio of published podcast episodes.</li>
                    </ul>
                ',
                'course_technologies' => 'Audacity, GarageBand, Anchor, Descript, Riverside.fm',
                'duration' => '6 Weeks',
            ],
            'Video Production for Social Media' => [
                'basic_requirements' => '
                    <p>No prior video experience is required. Participants should be comfortable using a smartphone or camera and interested in visual storytelling.</p>
                    <p>A laptop or mobile device with access to video editing apps is recommended.</p>
                    <p>This course is ideal for creators, marketers, and educators producing short-form video content.</p>
                ',
                'course_outline' => '
                    <p>The course covers planning, shooting, and editing videos for social platforms:</p>
                    <ol>
                        <li><strong>Video Formats:</strong> Reels, TikToks, YouTube Shorts, and stories.</li>
                        <li><strong>Scripting & Storyboarding:</strong> Planning shots, pacing, and visual flow.</li>
                        <li><strong>Shooting Techniques:</strong> Framing, lighting, and camera movement.</li>
                        <li><strong>Editing & Effects:</strong> Transitions, captions, music, and filters.</li>
                        <li><strong>Publishing & Optimization:</strong> Platform specs, hashtags, and engagement tactics.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build video production and platform fluency:</p>
                    <ul>
                        <li>Weekly filming and editing challenges.</li>
                        <li>Mini-projects focused on storytelling and visual style.</li>
                        <li>Peer reviews and engagement strategy critiques.</li>
                        <li>Capstone project: Publish a short-form video campaign across multiple platforms.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering video theory and platform trends.</li>
                        <li>One lab session for shooting and editing practice.</li>
                        <li>Optional office hours for feedback and optimization support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to produce engaging videos for social media. It emphasizes storytelling, production quality, and platform strategy.</p>
                    <p>By the end, students will be able to create and publish short-form videos that resonate with audiences.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Plan, shoot, and edit videos for social platforms.</li>
                        <li>Use mobile and desktop tools for video production.</li>
                        <li>Prepare for roles in content creation, marketing, and education.</li>
                        <li>Build a portfolio of social media video campaigns.</li>
                    </ul>
                ',
                'course_technologies' => 'CapCut, Adobe Premiere Rush, Canva Video, TikTok, Instagram Reels',
                'duration' => '6 Weeks',
            ],

            'Scriptwriting for Screen and Web' => [
                'basic_requirements' => '
                    <p>No prior screenwriting experience is required. Participants should enjoy storytelling and be interested in writing for video, film, or online media.</p>
                    <p>A laptop with access to scriptwriting tools or templates is recommended.</p>
                    <p>This course is ideal for writers, filmmakers, content creators, and marketers crafting scripted content.</p>
                ',
                'course_outline' => '
                    <p>The course covers the fundamentals of writing scripts for screen-based media:</p>
                    <ol>
                        <li><strong>Script Structure:</strong> Acts, scenes, beats, and pacing.</li>
                        <li><strong>Dialogue & Character:</strong> Voice, motivation, and subtext.</li>
                        <li><strong>Visual Writing:</strong> Action lines, transitions, and formatting.</li>
                        <li><strong>Genre & Platform:</strong> Writing for YouTube, short films, ads, and web series.</li>
                        <li><strong>Project Work:</strong> Write and workshop a short script for screen or web.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build narrative and formatting skills:</p>
                    <ul>
                        <li>Weekly writing prompts and scene breakdowns.</li>
                        <li>Mini-projects focused on dialogue, pacing, and visual storytelling.</li>
                        <li>Peer reviews and table reads.</li>
                        <li>Capstone project: Submit a polished short script with pitch materials.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One seminar session covering screenwriting theory and examples.</li>
                        <li>Optional workshops for script feedback and revision.</li>
                        <li>Guest speakers from film, TV, and digital media.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to write compelling scripts for screen and digital platforms. It emphasizes structure, character, and visual storytelling.</p>
                    <p>By the end, students will have a complete short script ready for production or pitching.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Write scripts for short films, web series, and branded content.</li>
                        <li>Master formatting and storytelling for screen.</li>
                        <li>Prepare for roles in writing, directing, or content development.</li>
                        <li>Build a portfolio of screenwriting samples.</li>
                    </ul>
                ',
                'course_technologies' => 'Celtx, WriterDuet, Final Draft, Google Docs, StudioBinder',
                'duration' => '5 Weeks',
            ],

            'Motion Graphics and Animation' => [
                'basic_requirements' => '
                    <p>Participants should have basic design or video editing experience. Familiarity with Adobe tools or animation software is helpful but not required.</p>
                    <p>A laptop with access to After Effects, Blender, or Canva Pro is recommended.</p>
                    <p>This course is ideal for designers, editors, and content creators producing animated visuals.</p>
                ',
                'course_outline' => '
                    <p>The course explores motion design and animation for digital media:</p>
                    <ol>
                        <li><strong>Animation Principles:</strong> Timing, easing, squash and stretch, and anticipation.</li>
                        <li><strong>Motion Graphics:</strong> Text animation, transitions, and kinetic typography.</li>
                        <li><strong>Tools & Techniques:</strong> Keyframing, masking, and compositing.</li>
                        <li><strong>Brand & Storytelling:</strong> Visual identity, rhythm, and narrative flow.</li>
                        <li><strong>Project Work:</strong> Create a motion graphic or animated explainer video.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build animation and storytelling skills:</p>
                    <ul>
                        <li>Weekly animation challenges and visual breakdowns.</li>
                        <li>Mini-projects focused on logo animation and explainer sequences.</li>
                        <li>Peer critiques and motion design showcases.</li>
                        <li>Capstone project: Publish a motion graphic or animated video with branding and sound.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering animation theory and tools.</li>
                        <li>One lab session for hands-on motion design and editing.</li>
                        <li>Optional office hours for feedback and rendering support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to create animated content for digital platforms. It emphasizes motion, rhythm, and visual storytelling.</p>
                    <p>By the end, students will be able to produce professional motion graphics and animations.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Create animated videos and motion graphics for web and social media.</li>
                        <li>Use animation tools to enhance storytelling and branding.</li>
                        <li>Prepare for roles in design, media production, and marketing.</li>
                        <li>Build a portfolio of animated content and motion design reels.</li>
                    </ul>
                ',
                'course_technologies' => 'Adobe After Effects, Blender, Canva Pro, LottieFiles, Figma',
                'duration' => '6 Weeks',
            ],
            'Digital Storytelling Capstone' => [
                'basic_requirements' => '
                    <p>Participants should have completed at least one storytelling, media, or production course. Experience with writing, audio, or video tools is expected.</p>
                    <p>A laptop with access to editing and publishing platforms is essential.</p>
                    <p>This course is ideal for creators ready to produce and publish a signature digital storytelling project.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through the creation of a complete digital media story:</p>
                    <ol>
                        <li><strong>Concept Development:</strong> Story idea, audience, and format selection.</li>
                        <li><strong>Production Planning:</strong> Script, storyboard, and asset preparation.</li>
                        <li><strong>Execution:</strong> Recording, editing, and post-production.</li>
                        <li><strong>Publishing:</strong> Platform selection, optimization, and promotion.</li>
                        <li><strong>Showcase:</strong> Present and reflect on the final storytelling project.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to support independent creative production:</p>
                    <ul>
                        <li>Weekly milestones and production check-ins.</li>
                        <li>Peer collaboration and critique sessions.</li>
                        <li>Mentoring and publishing support.</li>
                        <li>Final presentation: Publish and present a digital story with supporting materials.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One planning session with instructor feedback.</li>
                        <li>Optional labs for editing, publishing, and promotion.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply storytelling and media production skills in a self-directed project. It emphasizes creativity, polish, and audience engagement.</p>
                    <p>By the end, students will have a published digital story ready for their portfolio or audience.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Produce and publish a complete digital storytelling project.</li>
                        <li>Demonstrate creative and technical fluency across media formats.</li>
                        <li>Prepare for roles in content creation, media, and education.</li>
                        <li>Build a showcase portfolio and personal brand asset.</li>
                    </ul>
                ',
                'course_technologies' => 'Anchor, YouTube, Substack, Adobe Creative Cloud, Descript',
                'duration' => '6 Weeks',
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
            'Email Campaign Optimization' => [
                'basic_requirements' => '
                    <p>No prior experience is required. Participants should be comfortable using email platforms and basic writing tools.</p>
                    <p>A laptop with access to email marketing software like Mailchimp or ConvertKit is recommended.</p>
                    <p>This course is ideal for marketers, entrepreneurs, and content creators.</p>
                ',
                'course_outline' => '
                    <p>The course focuses on designing and optimizing email marketing campaigns:</p>
                    <ol>
                        <li><strong>Email Strategy:</strong> Audience segmentation, campaign goals, and content planning.</li>
                        <li><strong>Design & Copywriting:</strong> Templates, subject lines, CTAs, and personalization.</li>
                        <li><strong>Automation:</strong> Drip campaigns, triggers, and lifecycle emails.</li>
                        <li><strong>Testing & Optimization:</strong> A/B testing, deliverability, and open/click rate improvement.</li>
                        <li><strong>Analytics & Reporting:</strong> Performance tracking and ROI analysis.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build email marketing and optimization skills:</p>
                    <ul>
                        <li>Weekly email design and copywriting exercises.</li>
                        <li>Mini-projects focused on automation and segmentation.</li>
                        <li>Peer reviews and campaign audits.</li>
                        <li>Capstone project: Launch and optimize a multi-step email campaign.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering email strategy and tools.</li>
                        <li>One lab session for campaign setup and testing.</li>
                        <li>Optional office hours for feedback and analytics review.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to create and optimize email campaigns for engagement and conversion. It emphasizes strategy, automation, and performance tracking.</p>
                    <p>By the end, students will be able to run targeted email campaigns with measurable results.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design and launch effective email campaigns.</li>
                        <li>Use automation and segmentation to boost engagement.</li>
                        <li>Prepare for roles in email marketing and CRM strategy.</li>
                        <li>Build a portfolio of optimized email workflows and reports.</li>
                    </ul>
                ',
                'course_technologies' => 'Mailchimp, ConvertKit, HubSpot, Litmus, Google Postmaster Tools',
                'duration' => '5 Weeks',
            ],
            'Design Thinking for Social Innovation' => [
                'basic_requirements' => '
                    <p>No prior design experience is required. Participants should be passionate about solving social or environmental challenges.</p>
                    <p>A laptop with access to collaboration and prototyping tools is recommended.</p>
                    <p>This course is ideal for changemakers, nonprofit leaders, educators, and civic innovators.</p>
                ',
                'course_outline' => '
                    <p>The course introduces human-centered design for social impact:</p>
                    <ol>
                        <li><strong>Empathy & Discovery:</strong> Interviews, observation, and community engagement.</li>
                        <li><strong>Problem Framing:</strong> Defining needs, insights, and opportunity areas.</li>
                        <li><strong>Ideation:</strong> Brainstorming, co-creation, and concept development.</li>
                        <li><strong>Prototyping & Testing:</strong> Low-fidelity prototypes, feedback loops, and iteration.</li>
                        <li><strong>Project Work:</strong> Design and test a solution for a real-world social challenge.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build empathy and creative problem-solving skills:</p>
                    <ul>
                        <li>Weekly design sprints and community research tasks.</li>
                        <li>Mini-projects focused on ideation and prototyping.</li>
                        <li>Peer feedback and impact mapping sessions.</li>
                        <li>Capstone project: Present a tested social innovation prototype with user insights.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One workshop session for design thinking activities and case studies.</li>
                        <li>Optional labs for prototyping and user testing.</li>
                        <li>Guest speakers from NGOs, civic tech, and social enterprises.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to apply design thinking to social impact. It emphasizes empathy, creativity, and community collaboration.</p>
                    <p>By the end, students will be able to design and test solutions that address real-world challenges.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Apply design thinking to social and environmental issues.</li>
                        <li>Engage communities in co-creating solutions.</li>
                        <li>Prepare for roles in social innovation, civic tech, and nonprofit leadership.</li>
                        <li>Build a portfolio of human-centered design projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Miro, Figma, Google Forms, Canva, Notion',
                'duration' => '6 Weeks',
            ],

            'Civic Tech and Open Data' => [
                'basic_requirements' => '
                    <p>Participants should have basic digital literacy and an interest in public service, data, or technology. Coding experience is helpful but not required.</p>
                    <p>A laptop with internet access and spreadsheet or mapping tools is recommended.</p>
                    <p>This course is ideal for civic hackers, journalists, policy analysts, and community organizers.</p>
                ',
                'course_outline' => '
                    <p>The course explores how technology and open data can improve governance and civic engagement:</p>
                    <ol>
                        <li><strong>Open Data Principles:</strong> Transparency, accessibility, and licensing.</li>
                        <li><strong>Data Sources:</strong> Government portals, APIs, and public datasets.</li>
                        <li><strong>Data Analysis:</strong> Cleaning, visualization, and storytelling.</li>
                        <li><strong>Civic Applications:</strong> Dashboards, maps, and participatory tools.</li>
                        <li><strong>Project Work:</strong> Build a civic tech prototype using open data.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build data fluency and civic innovation skills:</p>
                    <ul>
                        <li>Weekly data exploration and mapping exercises.</li>
                        <li>Mini-projects focused on transparency and public accountability.</li>
                        <li>Peer reviews and usability testing.</li>
                        <li>Capstone project: Present a civic tech tool or open data dashboard.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering civic tech theory and case studies.</li>
                        <li>One lab session for data analysis and tool building.</li>
                        <li>Optional office hours for technical support and feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use open data and technology to improve civic life. It emphasizes transparency, participation, and public impact.</p>
                    <p>By the end, students will be able to build civic tech tools that empower communities and inform policy.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Use open data to build civic tools and dashboards.</li>
                        <li>Analyze and visualize public datasets for impact.</li>
                        <li>Prepare for roles in civic tech, journalism, and public innovation.</li>
                        <li>Build a portfolio of open data projects.</li>
                    </ul>
                ',
                'course_technologies' => 'OpenStreetMap, Google Sheets, Datawrapper, Leaflet.js, Socrata APIs',
                'duration' => '6 Weeks',
            ],

            'Tech-Enabled Social Entrepreneurship' => [
                'basic_requirements' => '
                    <p>No prior business or tech experience is required. Participants should be passionate about creating ventures that address social or environmental issues.</p>
                    <p>A laptop with access to productivity and prototyping tools is recommended.</p>
                    <p>This course is ideal for aspiring social entrepreneurs, nonprofit leaders, and impact-driven innovators.</p>
                ',
                'course_outline' => '
                    <p>The course explores how to launch and scale tech-enabled social ventures:</p>
                    <ol>
                        <li><strong>Social Enterprise Models:</strong> Mission, impact, and sustainability.</li>
                        <li><strong>Technology for Good:</strong> Tools, platforms, and digital inclusion.</li>
                        <li><strong>Business Planning:</strong> Value proposition, revenue models, and partnerships.</li>
                        <li><strong>Impact Measurement:</strong> Theory of change, KPIs, and reporting.</li>
                        <li><strong>Project Work:</strong> Develop a business plan and prototype for a tech-enabled social venture.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build entrepreneurial and impact design skills:</p>
                    <ul>
                        <li>Weekly venture planning and prototyping exercises.</li>
                        <li>Mini-projects focused on impact modeling and stakeholder mapping.</li>
                        <li>Peer reviews and pitch coaching.</li>
                        <li>Capstone project: Present a social venture pitch with business model and impact plan.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One seminar session covering social entrepreneurship frameworks and tools.</li>
                        <li>Optional labs for business planning and prototyping.</li>
                        <li>Guest speakers from social enterprises and impact funds.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to build sustainable ventures that use technology to solve social problems. It emphasizes innovation, impact, and scalability.</p>
                    <p>By the end, students will be able to design and pitch a tech-enabled social enterprise.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design and launch tech-enabled social ventures.</li>
                        <li>Measure and communicate social impact.</li>
                        <li>Prepare for roles in social entrepreneurship and impact investing.</li>
                        <li>Build a portfolio of venture plans and prototypes.</li>
                    </ul>
                ',
                'course_technologies' => 'Canva, Lean Canvas, Airtable, Glide, Google Slides',
                'duration' => '6 Weeks',
            ],
            'Inclusive Design and Accessibility' => [
                'basic_requirements' => '
                    <p>No prior design or coding experience is required. Participants should be interested in creating equitable and accessible digital experiences.</p>
                    <p>A laptop with access to web browsers and design tools is recommended.</p>
                    <p>This course is ideal for designers, developers, educators, and product teams committed to inclusion.</p>
                ',
                'course_outline' => '
                    <p>The course explores inclusive design principles and accessibility standards:</p>
                    <ol>
                        <li><strong>Inclusive Design Foundations:</strong> Equity, empathy, and user diversity.</li>
                        <li><strong>Accessibility Standards:</strong> WCAG, ARIA, and legal compliance.</li>
                        <li><strong>Design Practices:</strong> Color contrast, typography, and interaction patterns.</li>
                        <li><strong>Assistive Technologies:</strong> Screen readers, keyboard navigation, and alt text.</li>
                        <li><strong>Project Work:</strong> Audit and redesign a digital product for accessibility and inclusion.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build inclusive design and accessibility skills:</p>
                    <ul>
                        <li>Weekly audits and redesign challenges.</li>
                        <li>Mini-projects focused on inclusive UX and assistive tech compatibility.</li>
                        <li>Peer reviews and accessibility testing sessions.</li>
                        <li>Capstone project: Present an inclusive redesign with accessibility report.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering inclusive design theory and standards.</li>
                        <li>Optional labs for testing and redesign implementation.</li>
                        <li>Guest speakers from accessibility advocacy and inclusive tech.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to design digital products that are inclusive and accessible to all users. It emphasizes empathy, compliance, and usability.</p>
                    <p>By the end, students will be able to audit and improve digital experiences for accessibility and equity.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design inclusive and accessible digital products.</li>
                        <li>Understand and apply accessibility standards and tools.</li>
                        <li>Prepare for roles in UX, product design, and civic tech.</li>
                        <li>Build a portfolio of inclusive design audits and redesigns.</li>
                    </ul>
                ',
                'course_technologies' => 'WAVE, Axe, Figma, VoiceOver, NVDA, Lighthouse',
                'duration' => '5 Weeks',
            ],
            'Data for Social Impact' => [
                'basic_requirements' => '
                    <p>Participants should have basic spreadsheet or data visualization skills. Familiarity with social issues or nonprofit work is helpful.</p>
                    <p>A laptop with access to data analysis and visualization tools is recommended.</p>
                    <p>This course is ideal for analysts, researchers, and impact-driven teams using data to drive change.</p>
                ',
                'course_outline' => '
                    <p>The course explores how to use data to inform and amplify social impact:</p>
                    <ol>
                        <li><strong>Impact Data Sources:</strong> Surveys, public datasets, and program metrics.</li>
                        <li><strong>Data Cleaning & Analysis:</strong> Structuring, filtering, and interpreting data.</li>
                        <li><strong>Visualization & Storytelling:</strong> Charts, dashboards, and narrative framing.</li>
                        <li><strong>Ethics & Privacy:</strong> Responsible data use and community trust.</li>
                        <li><strong>Project Work:</strong> Build a data dashboard or report for a social issue or nonprofit initiative.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build data literacy and impact communication skills:</p>
                    <ul>
                        <li>Weekly data analysis and visualization exercises.</li>
                        <li>Mini-projects focused on storytelling and stakeholder reporting.</li>
                        <li>Peer reviews and data critique sessions.</li>
                        <li>Capstone project: Present a data-driven impact report or dashboard.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering data ethics and impact frameworks.</li>
                        <li>One lab session for analysis and visualization practice.</li>
                        <li>Optional office hours for mentoring and data support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use data to drive and communicate social impact. It emphasizes clarity, ethics, and storytelling.</p>
                    <p>By the end, students will be able to build data tools that inform decisions and inspire action.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Analyze and visualize data for social impact.</li>
                        <li>Communicate insights through dashboards and reports.</li>
                        <li>Prepare for roles in nonprofit analytics, research, and impact strategy.</li>
                        <li>Build a portfolio of data-driven impact projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Sheets, Tableau, Flourish, Datawrapper, Power BI',
                'duration' => '6 Weeks',
            ],
            'Tech for Social Impact Capstone' => [
                'basic_requirements' => '
                    <p>Participants should have completed prior courses in social innovation, civic tech, or impact design. Experience with prototyping or data tools is expected.</p>
                    <p>A laptop with access to collaboration, prototyping, and publishing tools is essential.</p>
                    <p>This course is ideal for learners ready to launch or showcase a tech-enabled social impact project.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through building and presenting a social impact solution:</p>
                    <ol>
                        <li><strong>Project Planning:</strong> Define problem, audience, and success metrics.</li>
                        <li><strong>Solution Development:</strong> Prototype, test, and refine the tech tool or campaign.</li>
                        <li><strong>Impact Strategy:</strong> Measurement, storytelling, and stakeholder alignment.</li>
                        <li><strong>Launch & Showcase:</strong> Publish, promote, and present the final project.</li>
                        <li><strong>Reflection:</strong> Lessons learned and future roadmap.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to support independent impact-driven development:</p>
                    <ul>
                        <li>Weekly milestones and deliverables.</li>
                        <li>Peer collaboration and feedback sessions.</li>
                        <li>Mentoring and showcase preparation.</li>
                        <li>Final presentation: Launch and present a tech-enabled social impact project.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One planning session with instructor guidance.</li>
                        <li>Optional labs for prototyping and storytelling.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply tech and design skills to a real-world social challenge. It emphasizes execution, impact, and public engagement.</p>
                    <p>By the end, students will have a launched or portfolio-ready social impact project.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Build and launch a tech-enabled social impact solution.</li>
                        <li>Demonstrate leadership in innovation and community engagement.</li>
                        <li>Prepare for roles in civic tech, social entrepreneurship, and nonprofit innovation.</li>
                        <li>Build a showcase portfolio and impact report.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Glide, Airtable, Google Slides, Loom, GitHub',
                'duration' => '6 Weeks',
            ],
            'Instructional Design Foundations' => [
                'basic_requirements' => '
                    <p>No prior teaching or design experience is required. Participants should be interested in creating effective learning experiences.</p>
                    <p>A laptop with access to presentation and collaboration tools is recommended.</p>
                    <p>This course is ideal for educators, trainers, and content creators designing learning materials or programs.</p>
                ',
                'course_outline' => '
                    <p>The course introduces core principles of instructional design:</p>
                    <ol>
                        <li><strong>Learning Theories:</strong> Behaviorism, constructivism, and cognitive load.</li>
                        <li><strong>Design Models:</strong> ADDIE, SAM, and backward design.</li>
                        <li><strong>Learning Objectives:</strong> Bloom’s taxonomy and measurable outcomes.</li>
                        <li><strong>Content Structuring:</strong> Sequencing, scaffolding, and chunking.</li>
                        <li><strong>Project Work:</strong> Design a learning module with objectives, content, and assessments.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build instructional planning and design skills:</p>
                    <ul>
                        <li>Weekly design challenges and theory applications.</li>
                        <li>Mini-projects focused on objective writing and content mapping.</li>
                        <li>Peer reviews and feedback sessions.</li>
                        <li>Capstone project: Present a complete instructional design plan for a course or workshop.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering design theory and frameworks.</li>
                        <li>Optional labs for module development and peer critique.</li>
                        <li>Guest speakers from education and corporate learning.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to design effective learning experiences using instructional design models. It emphasizes clarity, structure, and learner engagement.</p>
                    <p>By the end, students will be able to create instructional plans for diverse learning contexts.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design structured and engaging learning experiences.</li>
                        <li>Apply instructional design models to real-world learning needs.</li>
                        <li>Prepare for roles in education, training, and learning development.</li>
                        <li>Build a portfolio of instructional design artifacts.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Slides, Miro, Canva, Notion, Learning Designer',
                'duration' => '5 Weeks',
            ],

            'Digital Learning Tools and Platforms' => [
                'basic_requirements' => '
                    <p>Participants should have basic digital literacy and an interest in online learning environments. Teaching experience is helpful but not required.</p>
                    <p>A laptop with access to LMS platforms and edtech tools is recommended.</p>
                    <p>This course is ideal for educators, instructional designers, and trainers using digital platforms for learning delivery.</p>
                ',
                'course_outline' => '
                    <p>The course explores tools and platforms for digital learning:</p>
                    <ol>
                        <li><strong>LMS Overview:</strong> Moodle, Canvas, Google Classroom, and Microsoft Teams.</li>
                        <li><strong>Content Delivery:</strong> Videos, quizzes, discussion boards, and SCORM packages.</li>
                        <li><strong>Engagement Tools:</strong> Polls, breakout rooms, gamification, and feedback.</li>
                        <li><strong>Analytics & Reporting:</strong> Learner tracking, progress dashboards, and data insights.</li>
                        <li><strong>Project Work:</strong> Build a digital course module using selected tools and platforms.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build platform fluency and digital pedagogy:</p>
                    <ul>
                        <li>Weekly tool exploration and content creation exercises.</li>
                        <li>Mini-projects focused on learner engagement and assessment.</li>
                        <li>Peer reviews and usability testing.</li>
                        <li>Capstone project: Launch a digital learning module with analytics setup.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering platform features and pedagogy.</li>
                        <li>One lab session for course building and testing.</li>
                        <li>Optional office hours for platform support and feedback.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use digital platforms to deliver and manage learning experiences. It emphasizes usability, engagement, and data-informed instruction.</p>
                    <p>By the end, students will be able to build and launch digital learning modules across platforms.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Use LMS and edtech tools to deliver online learning.</li>
                        <li>Design engaging and data-informed digital courses.</li>
                        <li>Prepare for roles in e-learning, instructional design, and education technology.</li>
                        <li>Build a portfolio of digital learning modules and analytics dashboards.</li>
                    </ul>
                ',
                'course_technologies' => 'Moodle, Canvas, Google Classroom, Kahoot, Edpuzzle, SCORM',
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

            'Learning Experience Design (LxD)' => [
                'basic_requirements' => '
                    <p>Participants should have some experience in education, design, or content creation. Familiarity with learner-centered approaches is helpful.</p>
                    <p>A laptop with access to design and prototyping tools is recommended.</p>
                    <p>This course is ideal for instructional designers, educators, and edtech creators focused on learner engagement and experience.</p>
                ',
                'course_outline' => '
                    <p>The course explores how to design holistic and engaging learning experiences:</p>
                    <ol>
                        <li><strong>LxD Principles:</strong> Empathy, flow, motivation, and accessibility.</li>
                        <li><strong>Journey Mapping:</strong> Learner personas, touchpoints, and emotional arcs.</li>
                        <li><strong>Experience Prototyping:</strong> Storyboards, mockups, and feedback loops.</li>
                        <li><strong>Multimodal Design:</strong> Visuals, audio, interactivity, and adaptive pathways.</li>
                        <li><strong>Project Work:</strong> Design and present a learner experience prototype for a course or program.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build empathy and design thinking for learning:</p>
                    <ul>
                        <li>Weekly experience design and prototyping exercises.</li>
                        <li>Mini-projects focused on journey mapping and multimodal integration.</li>
                        <li>Peer reviews and usability critiques.</li>
                        <li>Capstone project: Present a learner experience prototype with design rationale.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One seminar session covering LxD theory and examples.</li>
                        <li>Optional labs for prototyping and feedback.</li>
                        <li>Guest speakers from edtech and instructional design.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to design learning experiences that are engaging, inclusive, and effective. It emphasizes empathy, creativity, and learner-centered design.</p>
                    <p>By the end, students will be able to prototype and present impactful learning journeys.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design learner-centered experiences using LxD principles.</li>
                        <li>Prototype and test multimodal learning journeys.</li>
                        <li>Prepare for roles in instructional design, edtech, and learning innovation.</li>
                        <li>Build a portfolio of experience design prototypes.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Miro, Canva, Adobe XD, Google Slides',
                'duration' => '6 Weeks',
            ],

            'Assessment Design and Feedback' => [
                'basic_requirements' => '
                    <p>Participants should have some experience in teaching, training, or instructional design. Familiarity with learning objectives is helpful.</p>
                    <p>A laptop with access to quiz, survey, and grading tools is recommended.</p>
                    <p>This course is ideal for educators, trainers, and learning designers focused on measuring learning outcomes.</p>
                ',
                'course_outline' => '
                    <p>The course explores how to design effective assessments and feedback systems:</p>
                    <ol>
                        <li><strong>Assessment Types:</strong> Formative, summative, diagnostic, and authentic assessments.</li>
                        <li><strong>Alignment:</strong> Matching assessments to learning objectives and cognitive levels.</li>
                        <li><strong>Rubrics & Criteria:</strong> Transparent grading and performance indicators.</li>
                        <li><strong>Feedback Strategies:</strong> Timely, actionable, and learner-centered feedback.</li>
                        <li><strong>Project Work:</strong> Design an assessment plan with rubrics and feedback workflows.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build evaluation and feedback design skills:</p>
                    <ul>
                        <li>Weekly assessment design and rubric creation exercises.</li>
                        <li>Mini-projects focused on feedback delivery and revision cycles.</li>
                        <li>Peer reviews and grading simulations.</li>
                        <li>Capstone project: Present a complete assessment and feedback system for a course or module.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering assessment theory and design models.</li>
                        <li>Optional labs for rubric building and feedback planning.</li>
                        <li>Guest speakers from education and corporate learning.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to design assessments that measure learning effectively and provide meaningful feedback. It emphasizes clarity, fairness, and learner growth.</p>
                    <p>By the end, students will be able to create assessment systems that support learning and performance.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design aligned and effective assessments.</li>
                        <li>Deliver feedback that improves learner outcomes.</li>
                        <li>Prepare for roles in education, training, and instructional design.</li>
                        <li>Build a portfolio of assessment plans and rubrics.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Forms, Kahoot, Edmodo, Canvas Quizzes, Rubric Tools',
                'duration' => '5 Weeks',
            ],

            'Facilitation and Online Teaching' => [
                'basic_requirements' => '
                    <p>Participants should have basic teaching or presentation experience. Comfort with video conferencing and online tools is recommended.</p>
                    <p>A laptop with webcam, microphone, and access to virtual classroom platforms is essential.</p>
                    <p>This course is ideal for educators, trainers, and facilitators teaching in online or hybrid environments.</p>
                ',
                'course_outline' => '
                    <p>The course explores strategies for engaging and supporting learners online:</p>
                    <ol>
                        <li><strong>Facilitation Techniques:</strong> Presence, pacing, questioning, and discussion management.</li>
                        <li><strong>Online Tools:</strong> Breakout rooms, polls, whiteboards, and chat moderation.</li>
                        <li><strong>Community Building:</strong> Icebreakers, norms, and inclusive practices.</li>
                        <li><strong>Support & Accessibility:</strong> Tech troubleshooting, scaffolding, and learner check-ins.</li>
                        <li><strong>Project Work:</strong> Plan and facilitate an online learning session with engagement strategies.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build facilitation and online teaching skills:</p>
                    <ul>
                        <li>Weekly facilitation practice and tool integration exercises.</li>
                        <li>Mini-projects focused on learner engagement and support.</li>
                        <li>Peer reviews and session critiques.</li>
                        <li>Capstone project: Deliver a live or recorded online session with facilitation plan.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One workshop session for facilitation practice and feedback.</li>
                        <li>Optional labs for tech setup and engagement planning.</li>
                        <li>Guest speakers from online education and virtual training.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to facilitate engaging and inclusive online learning experiences. It emphasizes presence, interaction, and learner support.</p>
                    <p>By the end, students will be able to lead effective online sessions and build virtual learning communities.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Facilitate engaging and inclusive online learning sessions.</li>
                        <li>Use digital tools to support interaction and accessibility.</li>
                        <li>Prepare for roles in online education, training, and virtual facilitation.</li>
                        <li>Build a portfolio of online teaching plans and session recordings.</li>
                    </ul>
                ',
                'course_technologies' => 'Zoom, Google Meet, Miro, Mentimeter, Padlet',
                'duration' => '6 Weeks',
            ],

            'Education & Learning Design Capstone' => [
                'basic_requirements' => '
                    <p>Participants should have completed prior courses in instructional design, digital learning, or facilitation. Experience with course planning or teaching is expected.</p>
                    <p>A laptop with access to design, collaboration, and publishing tools is essential.</p>
                    <p>This course is ideal for educators and learning designers ready to showcase a complete learning experience.</p>
                ',
                'course_outline' => '
                    <p>The course guides learners through designing and presenting a full learning experience:</p>
                    <ol>
                        <li><strong>Planning:</strong> Audience, objectives, format, and delivery strategy.</li>
                        <li><strong>Design:</strong> Content, assessments, and learner journey.</li>
                        <li><strong>Development:</strong> Build modules, materials, and engagement tools.</li>
                        <li><strong>Delivery & Reflection:</strong> Facilitate, collect feedback, and iterate.</li>
                        <li><strong>Showcase:</strong> Present the final learning experience with documentation and learner insights.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to support independent learning design and facilitation:</p>
                    <ul>
                        <li>Weekly milestones and design deliverables.</li>
                        <li>Peer collaboration and feedback sessions.</li>
                        <li>Mentoring and showcase preparation.</li>
                        <li>Final presentation: Deliver and reflect on a complete learning experience.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Sessions are held <strong>once weekly</strong> with optional labs:</p>
                    <ul>
                        <li>One planning session with instructor feedback.</li>
                        <li>Optional labs for development and facilitation support.</li>
                        <li>Final showcase and peer review session.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This capstone course allows learners to apply education design skills in a comprehensive project. It emphasizes planning, delivery, and reflection.</p>
                    <p>By the end, students will have a portfolio-ready learning experience and facilitation plan.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Design and deliver a complete learning experience.</li>
                        <li>Demonstrate instructional and facilitation skills.</li>
                        <li>Prepare for roles in education, training, and learning design leadership.</li>
                        <li>Build a showcase portfolio and learner feedback report.</li>
                    </ul>
                ',
                'course_technologies' => 'Figma, Canva, Google Slides, Zoom, LMS platforms',
                'duration' => '6 Weeks',
            ],

            'Data Literacy and Foundations' => [
                'basic_requirements' => '
                    <p>No prior data experience is required. Participants should be comfortable using spreadsheets and curious about data-driven thinking.</p>
                    <p>A laptop with access to spreadsheet and visualization tools is recommended.</p>
                    <p>This course is ideal for beginners, professionals, and students seeking to understand and work with data.</p>
                ',
                'course_outline' => '
                    <p>The course introduces core concepts of data literacy and analysis:</p>
                    <ol>
                        <li><strong>Data Types:</strong> Structured vs unstructured, qualitative vs quantitative.</li>
                        <li><strong>Data Collection:</strong> Surveys, sensors, APIs, and public datasets.</li>
                        <li><strong>Cleaning & Preparation:</strong> Formatting, missing values, and outliers.</li>
                        <li><strong>Basic Analysis:</strong> Sorting, filtering, pivot tables, and descriptive statistics.</li>
                        <li><strong>Project Work:</strong> Analyze a dataset and present findings using charts and summaries.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build confidence and fluency with data:</p>
                    <ul>
                        <li>Weekly spreadsheet and analysis exercises.</li>
                        <li>Mini-projects focused on data cleaning and exploration.</li>
                        <li>Peer reviews and data storytelling critiques.</li>
                        <li>Capstone project: Present a data analysis report with visualizations and insights.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>once weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering data concepts and tools.</li>
                        <li>Optional labs for spreadsheet practice and project support.</li>
                        <li>Guest speakers from data journalism and analytics.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to understand, clean, and analyze data using everyday tools. It emphasizes clarity, curiosity, and storytelling.</p>
                    <p>By the end, students will be able to explore datasets and communicate insights effectively.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Build foundational data skills using spreadsheets and charts.</li>
                        <li>Analyze and interpret real-world datasets.</li>
                        <li>Prepare for roles in data analysis, research, and decision-making.</li>
                        <li>Build a portfolio of data reports and visualizations.</li>
                    </ul>
                ',
                'course_technologies' => 'Google Sheets, Excel, Datawrapper, Tableau Public, Flourish',
                'duration' => '5 Weeks',
            ],

            'Python for Data Analysis' => [
                'basic_requirements' => '
                    <p>Participants should have basic programming experience or familiarity with Python syntax. Comfort with data and logic is helpful.</p>
                    <p>A laptop with Python, pandas, and Jupyter Notebook installed is recommended.</p>
                    <p>This course is ideal for aspiring data analysts, scientists, and developers working with structured data.</p>
                ',
                'course_outline' => '
                    <p>The course covers data analysis workflows using Python:</p>
                    <ol>
                        <li><strong>Data Structures:</strong> Lists, dictionaries, DataFrames, and arrays.</li>
                        <li><strong>Data Cleaning:</strong> Handling missing values, duplicates, and formatting.</li>
                        <li><strong>Exploratory Analysis:</strong> Grouping, filtering, and summary statistics.</li>
                        <li><strong>Visualization:</strong> Line charts, bar plots, histograms, and scatter plots.</li>
                        <li><strong>Project Work:</strong> Analyze a dataset and present findings using Python notebooks.</li>
                    </ol>
                ',
                'learning_module' => '
                    <p>Modules are designed to build coding and analytical fluency:</p>
                    <ul>
                        <li>Weekly coding labs and data challenges.</li>
                        <li>Mini-projects focused on cleaning and visualizing datasets.</li>
                        <li>Peer reviews and notebook critiques.</li>
                        <li>Capstone project: Submit a Python notebook with full analysis and visualizations.</li>
                    </ul>
                ',
                'course_schedule' => '
                    <p>Classes are held <strong>twice weekly</strong>:</p>
                    <ul>
                        <li>One lecture session covering Python and pandas workflows.</li>
                        <li>One lab session for hands-on coding and analysis.</li>
                        <li>Optional office hours for debugging and project support.</li>
                    </ul>
                ',
                'course_overview' => '
                    <p>This course teaches how to use Python for data analysis and visualization. It emphasizes clarity, reproducibility, and storytelling through code.</p>
                    <p>By the end, students will be able to analyze datasets and present insights using Python notebooks.</p>
                ',
                'benefits' => '
                    <ul>
                        <li>Use Python and pandas to clean and analyze data.</li>
                        <li>Create visualizations and share insights through notebooks.</li>
                        <li>Prepare for roles in data science, analytics, and research.</li>
                        <li>Build a portfolio of Python data projects.</li>
                    </ul>
                ',
                'course_technologies' => 'Python, pandas, NumPy, Matplotlib, Jupyter Notebook',
                'duration' => '6 Weeks',
            ],
        ];
        $programName = $program->program_name;
        $courseName = $courseTitles[$programName][array_rand($courseTitles[$programName])];

        if (\App\Models\Courses::where('course_name', $courseName)->doesntExist()) {

            // Base structure with fallback values
            $courseData = [
                'slug' => RandomString(9),
                'course_name' => $courseName,
                'banner' => 'els-logo.png',
                'user_id' => 1,
                'programSlug' => $program->slug,
                'basic_requirements' => $this->faker->paragraph(),
                'course_outline' => $this->faker->paragraph(),
                'learning_module' => $this->faker->paragraph(),
                'course_schedule' => $this->faker->paragraph(),
                'course_overview' => $this->faker->paragraph(),
                'packages_included' => $this->faker->sentence(),
                'payment_structure' => "Not-Auto Generated",
                'benefits' => $this->faker->paragraph(),
                'course_technologies' => json_encode([$this->faker->word(5)]),
                'duration' => '4 Weeks',
                'training_type' => json_encode([$this->faker->word(5)]),
            ];

            // Override with actual course details if available
            if (isset($courseDetails[$courseName])) {
                $details = $courseDetails[$courseName];
                $courseData = array_merge($courseData, [
                    'basic_requirements' => $details['basic_requirements'],
                    'course_outline' => $details['course_outline'],
                    'learning_module' => $details['learning_module'],
                    'course_schedule' => $details['course_schedule'],
                    'course_overview' => $details['course_overview'],
                    'benefits' => $details['benefits'],
                    'course_technologies' => json_encode([$details['course_technologies']]),
                    'duration' => $details['duration'],
                    'payment_structure' => "System Generated",
                    'training_type' =>json_encode([$this->faker->word()])
                ]);
            }
            return $courseData;
        }
       
    }

}
