-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308:3308
-- Generation Time: Nov 13, 2025 at 09:03 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `expertlink_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'BrRnbUK',
  `image` text NOT NULL,
  `heading` text NOT NULL,
  `description` longtext NOT NULL,
  `status` tinyint(1) DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `event_date` text DEFAULT NULL,
  `event_gallery` text DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'ByE59HjSV8tQ',
  `course_name` varchar(255) NOT NULL,
  `programSlug` varchar(255) NOT NULL,
  `course_price` longtext NOT NULL DEFAULT '10000',
  `user_id` varchar(255) NOT NULL,
  `banner` longtext DEFAULT NULL,
  `basic_requirements` longtext DEFAULT NULL,
  `course_outline` longtext DEFAULT NULL,
  `learning_module` longtext DEFAULT NULL,
  `course_schedule` longtext DEFAULT NULL,
  `training_type` longtext DEFAULT NULL,
  `payment_structure` longtext DEFAULT NULL,
  `course_overview` longtext DEFAULT NULL,
  `course_technologies` longtext DEFAULT NULL,
  `packages_included` longtext DEFAULT NULL,
  `duration` longtext DEFAULT '3 Months',
  `ratings` longtext DEFAULT '4',
  `benefits` longtext DEFAULT NULL,
  `course_discount` longtext DEFAULT '0',
  `course_introduction` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `slug`, `course_name`, `programSlug`, `course_price`, `user_id`, `banner`, `basic_requirements`, `course_outline`, `learning_module`, `course_schedule`, `training_type`, `payment_structure`, `course_overview`, `course_technologies`, `packages_included`, `duration`, `ratings`, `benefits`, `course_discount`, `course_introduction`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'ByE59HjSV8tQ', 'Object-Oriented Programming in Java', 'uJj4OgP', '10000', '1', 'els.png', '\n                    <p>This course is designed for learners with a foundational understanding of programming concepts such as variables, loops, and conditionals. Prior exposure to any programming language (e.g., Python, C++, or JavaScript) will be beneficial.</p>\n                    <p>Participants should be comfortable using a code editor or IDE and have basic knowledge of how software is compiled and executed. Access to a computer with Java Development Kit (JDK) and IntelliJ IDEA or Eclipse installed is required.</p>\n                    <p>A logical mindset, attention to detail, and willingness to debug and refactor code are essential for mastering object-oriented programming principles.</p>\n                ', '\n                    <p>The curriculum is structured to provide a deep understanding of object-oriented programming using Java. Key modules include:</p>\n                    <ol>\n                        <li><strong>Introduction to Java:</strong> Java syntax, data types, control structures, and IDE setup.</li>\n                        <li><strong>Core OOP Concepts:</strong> Classes, objects, encapsulation, inheritance, polymorphism, and abstraction.</li>\n                        <li><strong>Advanced OOP Techniques:</strong> Interfaces, abstract classes, method overloading/overriding, and exception handling.</li>\n                        <li><strong>Design Patterns & Best Practices:</strong> Introduction to SOLID principles, reusable code, and clean architecture.</li>\n                        <li><strong>Testing & Debugging:</strong> Unit testing with JUnit, debugging strategies, and code refactoring.</li>\n                    </ol>\n                ', '\n                    <p>Each module is designed to reinforce theoretical concepts through practical application:</p>\n                    <ul>\n                        <li>Hands-on coding labs to implement OOP principles in real-world scenarios.</li>\n                        <li>Mini-projects such as building a library system, inventory manager, or student portal.</li>\n                        <li>Weekly quizzes and code reviews to assess understanding and improve code quality.</li>\n                        <li>Final project involving the design and development of a fully functional Java application.</li>\n                    </ul>\n                ', '\n                    <p>The course spans <strong>9 weeks</strong> and follows a structured weekly schedule:</p>\n                    <ul>\n                        <li>Two theory sessions covering core concepts and live coding demonstrations.</li>\n                        <li>One lab session focused on project development and debugging techniques.</li>\n                        <li>Final project review and presentation in week 9, with peer and instructor feedback.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This course offers a comprehensive introduction to object-oriented programming using Java. It equips learners with the skills to design modular, maintainable, and scalable software systems.</p>\n                    <p>By the end of the program, students will be able to apply OOP principles confidently, write clean and testable Java code, and understand how to structure applications using industry best practices.</p>\n                ', 'Java, IntelliJ IDEA, JUnit, Git', NULL, '9 Weeks', '4', '\n                    <ul>\n                        <li>Master object-oriented programming fundamentals and advanced Java features.</li>\n                        <li>Build a portfolio of Java applications demonstrating real-world problem-solving.</li>\n                        <li>Gain experience with professional development tools like IntelliJ IDEA and JUnit.</li>\n                        <li>Prepare for technical interviews and entry-level software engineering roles.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(2, 'ByE59HjSV8tQ', 'CI/CD Pipelines with Jenkins', 'i3duKSm', '10000', '1', 'els.png', 'Quia et quos enim blanditiis. Quia enim ratione sit aut libero alias et. Et culpa qui dolorem nihil qui eos provident. Consequuntur ea illo laborum.', 'Tempora laboriosam provident eaque reprehenderit officia. Qui est quo hic eligendi. Minus quos rerum ab nam non.', 'Omnis rerum minima odit ut ea quis sit. Facilis minus quibusdam sunt. Quis ducimus quaerat culpa dolorem dolor suscipit earum. Quidem aut labore qui. Voluptatem sequi aut expedita assumenda quis itaque quisquam minus.', 'Quis sunt quis doloremque earum autem. Sed adipisci delectus voluptatem sint blanditiis cumque. Consequatur rerum consequatur unde est.', 'amet', 'Hic dolorem dolorem placeat sapiente. Sapiente non accusantium nulla porro aut ea.', 'Debitis reiciendis nesciunt voluptas minima voluptas. Iusto qui consequuntur quidem provident voluptas nam. Aliquam nostrum veritatis ipsum veniam suscipit sit. Illo qui alias assumenda in.', 'laboriosam nam et facere nesciunt est quae hic inventore illo', 'Et delectus eos est aperiam.', '4 Weeks', '4', 'Numquam odio deserunt fugit quaerat et perferendis dolor repellendus. Et excepturi cumque omnis unde voluptatem. Id commodi blanditiis laborum ut magni et modi aut.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(3, 'ByE59HjSV8tQ', 'Influencer Marketing Tactics', 'Rqo2KOn', '10000', '1', 'els.png', 'Soluta molestiae nihil nemo occaecati in ratione voluptate. Saepe culpa odit enim. Dolorem aut atque qui laboriosam. Veniam vel ipsa quibusdam.', 'Velit voluptatem atque mollitia. Adipisci necessitatibus et dolor. Ratione ut veniam vel rerum est provident non culpa.', 'Labore nesciunt fuga voluptas et rerum voluptatem non. Minima quaerat dolor quibusdam molestiae porro. Atque optio officia doloribus optio velit labore odio.', 'Nobis dolor ut et cumque facere voluptatem. Accusamus dolores nisi occaecati sit quae. Impedit dicta commodi voluptatem quibusdam eligendi.', 'velit', 'Quia voluptatem qui voluptas alias officia vel voluptatem. A et quam qui soluta consequatur corporis adipisci. Libero quibusdam eum perspiciatis non consequatur natus. Porro qui exercitationem error dolore qui.', 'Saepe corporis dicta exercitationem nihil voluptatem voluptatem. Dignissimos cumque vitae ex officiis iusto architecto non. Vitae rerum voluptatem et veniam.', 'quaerat et nemo odit est laborum laborum provident deserunt quaerat', 'Voluptatem officiis voluptates excepturi molestiae.', '4 Weeks', '4', 'Quod quia numquam quod error odit reiciendis. Qui placeat est ratione corrupti ut quibusdam accusamus. Rerum inventore nulla atque dolore eveniet voluptates temporibus neque. Possimus inventore in beatae ea ea deserunt.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(4, 'ByE59HjSV8tQ', 'Data-Driven Decision Making', 'V6HodKJ', '10000', '1', 'els.png', 'Eligendi deserunt eum commodi voluptatem debitis quo. Cumque ipsam non et. Velit officiis non quo fugiat.', 'Nulla sunt ratione consequuntur repudiandae sunt necessitatibus debitis. Placeat non fuga dolor cupiditate sed et. Hic placeat aliquid explicabo maiores enim unde sit. Quod hic perspiciatis suscipit eos ipsa quas et. Velit ea dolore qui id nisi eaque.', 'Sint dicta debitis natus aliquid sed. Odit fuga quo possimus eos. Accusantium minima odio illum et quasi.', 'Aut iure et nulla deleniti qui aspernatur nemo. Accusantium explicabo et est nulla. Eos officiis non dolores fugit.', 'expedita', 'Temporibus laborum et reiciendis vitae. Magnam quidem omnis exercitationem adipisci harum fugit.', 'Quidem corrupti voluptatem excepturi id omnis. Excepturi at voluptate eligendi molestiae. Dicta culpa qui repudiandae soluta.', 'necessitatibus aut consequatur eum eligendi dolore quis unde fuga a', 'Inventore reiciendis odit sint magni.', '4 Weeks', '4', 'Totam assumenda non quos occaecati atque illo. Dolores magni eligendi assumenda eligendi. Iste in quia tenetur. Quas expedita similique fuga rerum et.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(5, 'ByE59HjSV8tQ', 'Deep Learning with TensorFlow', 'dkom0SA', '10000', '1', 'els.png', 'Doloremque illo quis vel nihil ut dolorem modi. Sint hic quidem repellendus. Tenetur nulla vero dignissimos debitis et dolorem tempore.', 'Dolorem culpa aliquam esse fuga ea. Ducimus velit illum qui et voluptate. At pariatur praesentium velit ullam reiciendis. Et eveniet quibusdam quia et error. Laudantium earum dolorem repudiandae voluptatem.', 'Eum qui ab temporibus ut. Architecto ratione et unde deleniti nulla. Natus vel enim esse debitis.', 'Tempora impedit ad ullam quibusdam ullam. Nesciunt rem fugit omnis earum. Quia voluptas blanditiis suscipit labore.', 'optio', 'Vel dolores dolor repellat fuga accusamus id. Fugiat nisi iusto adipisci consequuntur. Voluptatibus corrupti ipsa eos porro quos nam consectetur. Repudiandae expedita a perferendis cum dolorem.', 'Iste aliquid facere voluptatem provident et odit dolor. Nihil rerum atque natus laudantium. Eum incidunt omnis consequatur itaque eos.', 'et sint quia et mollitia autem fuga accusamus possimus pariatur', 'Qui quod soluta quo magni.', '4 Weeks', '4', 'Rerum rerum dolor aut minima error. Itaque dolorum ipsum sit fugiat. Quibusdam maxime quia voluptas consectetur velit. Mollitia eligendi ducimus saepe voluptas qui. Quo ut veritatis sit laudantium sapiente ut voluptatem magnam.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(6, 'ByE59HjSV8tQ', 'Django Web Development Bootcamp', 'Hm7VKLN', '10000', '1', 'els.png', 'Illum sed ipsam eos quis. Et perspiciatis accusamus exercitationem exercitationem sed qui. Quos et facilis inventore et voluptatum.', 'Eum nihil saepe odit beatae aut alias deserunt debitis. Fugit eos enim ab quia sunt dolorem animi. Doloremque illo eligendi consequuntur doloremque cumque ipsa. Porro dolores odit cumque molestiae repudiandae animi ea.', 'Quae voluptate excepturi eum rerum doloremque eligendi recusandae. Molestias quo autem animi velit consequatur a. Ut id consequatur aut ea ut saepe vitae.', 'Quasi odit accusamus quo. Sed voluptas laboriosam expedita. Quia id accusamus aut et quaerat.', 'quia', 'Vel et sed et et. Alias id et eaque numquam quam. Sequi quia commodi tenetur illo nihil quod voluptatem.', 'Explicabo est culpa eius cumque similique. In expedita aut voluptas non.', 'et facilis ullam ut maxime omnis placeat non nemo provident', 'Sunt provident ut sit.', '4 Weeks', '4', 'Voluptates praesentium deleniti rerum atque blanditiis ut nisi. Quod quia quo doloribus voluptates. Ut repellendus eos aut assumenda hic dicta est.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(7, 'ByE59HjSV8tQ', 'Data-Driven Decision Making', 'V6HodKJ', '10000', '1', 'els.png', 'Est quis tempora rerum ab voluptas sequi voluptate dolore. Qui ullam labore harum tenetur. Eaque consequatur omnis minima ea odit error quae.', 'Quam perspiciatis incidunt molestias tenetur placeat. Nostrum quidem quo quo autem. Aut sequi ut repellendus. Doloremque sed accusamus et magnam eum tempore officia.', 'Officiis distinctio dolorem praesentium voluptatum aut aliquam. Accusantium consequatur neque nesciunt aliquam. Eum accusantium non nam tempore facilis amet labore. Voluptatem voluptates eaque et dolorem.', 'Sunt dolores maxime rerum earum incidunt quibusdam. Possimus corporis voluptatum error occaecati. Nisi iusto est sit unde enim. Maxime illo aut est voluptas qui sint temporibus.', 'deserunt', 'Amet facere nesciunt qui minima. Earum facilis quas hic pariatur placeat qui similique. Beatae aperiam cum et quae dolorem ipsam quia recusandae. Aut nostrum eius velit ut dolorem consequatur voluptas ratione.', 'Eaque illo aliquid et alias quaerat. Rem tempore alias aliquid eum aut aut eveniet vero. Enim voluptate quos voluptatem earum est ducimus. Ad animi assumenda facere dolore numquam recusandae.', 'voluptas vero aut ducimus voluptas quo quibusdam autem esse quas', 'Eum dolorem qui non et soluta odio nam.', '4 Weeks', '4', 'Voluptatem ut est a et ut culpa veritatis. Quod illum error sit cumque. Minus fuga eum autem delectus iste id non. Omnis porro et vitae sint.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(8, 'ByE59HjSV8tQ', 'Adobe XD for Beginners', 'pXftY6G', '10000', '1', 'els.png', 'Vitae totam quas ex nihil. Veritatis aut quia alias.', 'Quibusdam sed optio neque. Vel magni et non ratione dolores. Minima quia vitae dolore atque dolore reprehenderit eum dolorem.', 'Sit et quo et aut doloribus quis. Voluptate ut aut deserunt. Impedit aut libero vero quaerat ea iure.', 'Dignissimos rerum quam excepturi vel expedita a. Sequi tenetur quaerat in adipisci. Sint eos recusandae optio velit explicabo.', 'ipsam', 'Ducimus sit molestias molestiae odio sint odio enim. Earum consectetur accusamus consectetur repellendus provident. Ullam sint exercitationem inventore aspernatur odio numquam quod consequuntur.', 'Sapiente explicabo aut recusandae. Quam nostrum assumenda voluptatem alias quia. Ea id quibusdam qui quasi nulla. Optio dolores eligendi amet culpa magnam animi delectus.', 'possimus eaque aut aspernatur distinctio qui aliquam doloribus consectetur dolor', 'Aut deserunt autem et.', '4 Weeks', '4', 'Ea ab dolor aut consectetur. Ea enim ut autem. Et ut est consequatur corrupti doloribus. Corrupti doloribus porro repellat ex eius amet.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(9, 'ByE59HjSV8tQ', 'Refactoring Legacy Code', 'uJj4OgP', '10000', '1', 'els.png', 'Modi est illum temporibus ut inventore enim est. Repellat dolor non optio animi modi. Non porro aliquam iusto dolorum omnis placeat ut ducimus. Itaque aperiam aspernatur et est.', 'Quae architecto autem iusto dicta voluptate accusantium nihil. Ut ab vel in nesciunt explicabo. Laboriosam tempore quas atque temporibus numquam.', 'Sed iusto iusto magnam minima ipsum hic. Et iure iste beatae laboriosam aut maxime ipsum consequatur. Et magni dignissimos voluptate est accusantium. Tenetur quae occaecati quia.', 'Minus necessitatibus maiores et quisquam modi illo occaecati. Et expedita quisquam libero sit et. Rerum debitis id placeat voluptatibus voluptate quibusdam numquam.', 'velit', 'Quaerat illum recusandae a distinctio. Totam autem similique et labore et. Eum culpa eius adipisci sunt.', 'Aperiam incidunt aspernatur deserunt. Magni quis aut adipisci non consequatur et qui ut. Non quod est dignissimos maiores excepturi pariatur vel.', 'culpa similique enim culpa fugit vero dolores est ducimus assumenda', 'Occaecati omnis sit saepe ab et adipisci.', '4 Weeks', '4', 'Aperiam explicabo optio soluta eos nisi iusto. Odit eveniet soluta est alias ratione. Maxime itaque enim quaerat aut.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(10, 'ByE59HjSV8tQ', 'Typography and Layout Essentials', 'pXftY6G', '10000', '1', 'els.png', 'Nihil officia incidunt perferendis blanditiis. Totam minima similique tenetur ut et eaque provident. Vero est ea consequuntur debitis minus maiores minus.', 'Quas molestias a minima veniam voluptatem non ullam. Reiciendis voluptate quia libero nesciunt voluptas nisi deleniti. Commodi adipisci corporis amet similique consectetur omnis. Sunt velit aut est similique molestiae explicabo.', 'Impedit eum eos dolorem. Assumenda facere nesciunt quis quia reiciendis. Quasi exercitationem reprehenderit ut tempore qui.', 'Fugit aut dicta maxime incidunt est corporis. Dolor odit rerum deleniti impedit. Voluptates aut quaerat natus ut cumque corporis dolores.', 'qui', 'Possimus et molestias maxime officiis facere enim. Repudiandae voluptas dolore voluptatibus voluptatem non officiis eius. Ipsam perspiciatis alias quae consequuntur ullam sit. Sit et et et quo et magni repellendus.', 'Quis voluptas delectus rerum sunt perspiciatis. Ducimus soluta quaerat et totam. Sint nihil aliquam sit vel minima.', 'tenetur saepe omnis ipsum enim unde sequi minus eveniet voluptas', 'Voluptatem sunt distinctio nam.', '4 Weeks', '4', 'Aperiam commodi doloribus magni id. Quos dolorem temporibus perspiciatis sed facere ad. Aliquid molestiae ipsa optio officiis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(11, 'ByE59HjSV8tQ', 'Infrastructure as Code with Terraform', 'i3duKSm', '10000', '1', 'els.png', 'In velit ut est inventore occaecati aut beatae. Harum tempora et voluptas error. Quas dolore labore est. Sit eligendi odit minima quis rerum nesciunt dolor.', 'Rerum pariatur voluptatem vitae dolores nihil deserunt nobis. Molestias rerum facilis veritatis qui quod. Ut modi distinctio asperiores quia error impedit quod. Vel eius esse et non quas quod voluptas.', 'Eum error voluptates ducimus sunt repellendus distinctio. Impedit dolorem hic voluptas ratione aut non ipsa quos. At beatae doloremque provident.', 'Pariatur ipsum qui labore nesciunt blanditiis quod illo. Quia hic inventore non similique fuga harum iure. Quis asperiores aut in nostrum veniam similique. Ut alias quis est itaque omnis.', 'quaerat', 'Quae temporibus eveniet tempora consectetur repellat. Quia unde aut a eos aut. Voluptatem amet possimus ea unde totam. Eius et reprehenderit dolorem.', 'Illo dolorem dolores dolore. Repellat et vero ipsa assumenda. Ipsa eum vel veniam reprehenderit. Molestiae fugit voluptatem odit nihil.', 'quasi aut illum distinctio quo aliquid cum expedita rerum est', 'Consequatur rerum ut aut.', '4 Weeks', '4', 'Totam asperiores qui omnis dicta. Quos saepe perspiciatis vel qui necessitatibus cumque. Minima atque at eveniet eveniet et nobis placeat ut. Architecto est et soluta enim illo.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(12, 'ByE59HjSV8tQ', 'Cloud Security Fundamentals', 'wElWYnx', '10000', '1', 'els.png', 'Magnam consequatur et et error omnis voluptatem suscipit. Dicta vitae neque aliquam explicabo. Ut provident delectus voluptatem nemo consequuntur. Saepe eius eius doloribus blanditiis nobis aut itaque ad.', 'Ratione cum ipsam facere eius ratione iure aut et. Aut dicta perferendis voluptatem perferendis totam qui. Et veniam temporibus accusamus. Voluptatem quod et nesciunt voluptatem aliquid at.', 'Sed consequatur ea similique et aut. Aliquid aperiam rerum ratione architecto qui excepturi consequuntur. Quo sunt qui quasi dolores labore.', 'Dolorem vitae et excepturi sit. Ut temporibus cumque fuga et expedita non. Ut sunt non quo. Esse atque porro eum culpa nihil deleniti enim.', 'aperiam', 'Necessitatibus molestiae sit eaque soluta error. Beatae doloremque voluptatem sint ab et. Dolorum ea atque minima animi.', 'Necessitatibus libero magnam reiciendis incidunt suscipit expedita dolores aliquam. Recusandae minima aut nam delectus unde. Dolores architecto tenetur sed ut tempora quibusdam debitis. Inventore consequatur sapiente est.', 'exercitationem totam impedit aut ipsam sequi voluptas est aperiam quam', 'Dolores quo officiis ab ut ex ut consequatur qui.', '4 Weeks', '4', 'Laudantium facere quas consequuntur aut. Necessitatibus voluptatem quia voluptate. Sit ut amet sed omnis. Delectus illum laborum eos consequatur.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(13, 'ByE59HjSV8tQ', 'Machine Learning with Scikit-Learn', 'dkom0SA', '10000', '1', 'els.png', '\n                    <p>This course is designed for learners who have a working knowledge of Python programming and a basic understanding of statistical concepts such as mean, variance, and probability distributions.</p>\n                    <p>Participants should be comfortable using Jupyter Notebooks and libraries like NumPy and Pandas for data manipulation. Prior exposure to data analysis or visualization will be helpful but is not mandatory.</p>\n                    <p>A laptop with Python installed and access to Scikit-learn, Matplotlib, and Seaborn is required for completing hands-on exercises and projects.</p>\n                ', '\n                    <p>The curriculum provides a structured introduction to machine learning using Scikit-learn. Key modules include:</p>\n                    <ol>\n                        <li><strong>Data Preparation:</strong> Loading, cleaning, and preprocessing datasets using Pandas and NumPy.</li>\n                        <li><strong>Supervised Learning:</strong> Implementing regression and classification models including Linear Regression, Decision Trees, and Support Vector Machines.</li>\n                        <li><strong>Unsupervised Learning:</strong> Applying clustering algorithms such as K-Means and DBSCAN to uncover hidden patterns.</li>\n                        <li><strong>Model Evaluation:</strong> Using metrics like accuracy, precision, recall, and ROC curves to assess model performance.</li>\n                        <li><strong>Feature Engineering:</strong> Transforming and selecting features to improve model accuracy and generalization.</li>\n                    </ol>\n                ', '\n                    <p>Each module combines theoretical instruction with practical implementation:</p>\n                    <ul>\n                        <li>Hands-on coding exercises using Jupyter Notebooks and real-world datasets.</li>\n                        <li>Algorithm tuning and hyperparameter optimization using GridSearchCV and cross-validation.</li>\n                        <li>Weekly quizzes and peer-reviewed assignments to reinforce learning outcomes.</li>\n                        <li>Final project involving end-to-end model development, evaluation, and deployment.</li>\n                    </ul>\n                ', '\n                    <p>The course runs for <strong>7 weeks</strong> with the following weekly structure:</p>\n                    <ul>\n                        <li>One theory session covering algorithm fundamentals and use cases.</li>\n                        <li>One lab session focused on coding implementation and model experimentation.</li>\n                        <li>Final model deployment and project presentation in week 7.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This program introduces learners to the core principles of machine learning using Python and Scikit-learn. Through a blend of theory and hands-on practice, students will learn to build, evaluate, and optimize predictive models.</p>\n                    <p>By the end of the course, participants will be able to apply machine learning techniques to real-world datasets and communicate insights effectively.</p>\n                ', 'Scikit-learn, Pandas, NumPy, Matplotlib, Seaborn', NULL, '7 Weeks', '4', '\n                    <ul>\n                        <li>Gain practical experience with supervised and unsupervised learning algorithms.</li>\n                        <li>Build a portfolio of machine learning projects using Scikit-learn and Python.</li>\n                        <li>Develop skills in data preprocessing, model evaluation, and feature engineering.</li>\n                        <li>Prepare for roles in data science, machine learning engineering, or AI research.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(14, 'ByE59HjSV8tQ', 'Visual Storytelling for Designers', 'pXftY6G', '10000', '1', 'els.png', 'Accusantium voluptatibus et asperiores. Nostrum enim et animi porro doloribus voluptas. Eum fuga et voluptatem voluptatem recusandae.', 'In sequi facilis debitis pariatur. Minus nemo minus dolores magnam aut sunt dolore. Quod perferendis ut vel et possimus. Accusamus a eos sed accusamus accusamus nihil. Labore quas eum vel ullam quasi.', 'Odit voluptates voluptas consequatur eveniet alias. Ipsam odit sint dolor totam dolorum distinctio totam. Ipsam veritatis et eius dolorem.', 'Quidem officia aspernatur rerum et. Dignissimos impedit sed ea dolorem animi saepe nam. Tenetur cumque non maiores minima. Eligendi dolor aliquam magnam eos.', 'officiis', 'Rerum quia est debitis nihil quis aut consequatur. Deserunt quis totam sed quibusdam itaque. Esse blanditiis provident quidem dolorum delectus vitae velit. Dolor autem nesciunt ex veritatis.', 'Excepturi ea voluptatem ab. Recusandae eaque iure tempora omnis aut quasi. Impedit et repellat enim. Qui pariatur cum aut et amet accusantium.', 'accusantium aut ipsum nobis labore et expedita pariatur velit nihil', 'At nesciunt saepe facere.', '4 Weeks', '4', 'Magnam voluptas incidunt voluptatem qui fugiat cumque. Eius vitae et quia id sit qui. Est praesentium ut laborum aut. Officia aperiam et quos eos repudiandae.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(15, 'ByE59HjSV8tQ', 'Excel for Business Analytics', 'V6HodKJ', '10000', '1', 'els.png', 'Facere iure ducimus perferendis aliquam et et animi. Eum illo est quisquam ut ea tempora. Laudantium qui sunt ab autem consequatur ea a.', 'Est nemo fugiat sint libero aut. Magni maiores et dignissimos non hic sit. Voluptate non perferendis ut ut.', 'Quas unde ut laborum ex totam. Praesentium veniam iure ad nulla quam molestiae aut. Eum nisi est qui nam aspernatur occaecati. Autem voluptatem accusamus itaque eum ipsam ex.', 'Ut debitis quia voluptas veritatis. Dolor ullam dolores libero error illo consequatur quas. Sapiente numquam blanditiis omnis.', 'qui', 'Ea odit non voluptates explicabo. Qui voluptate debitis et beatae quia eum. Laudantium earum amet tenetur animi nam.', 'Aut doloremque quibusdam iure quidem maxime. Rerum et eos nulla molestias assumenda rem ut et. Reprehenderit quis quia assumenda possimus consequatur et doloremque ullam.', 'velit asperiores cupiditate esse ea ut ullam placeat nobis nam', 'Fugiat mollitia voluptatem qui et quae doloribus.', '4 Weeks', '4', 'Tempore eius aliquid architecto qui reiciendis molestias. Iusto a illum animi. Repudiandae voluptate ducimus ullam perferendis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(16, 'ByE59HjSV8tQ', 'Applied Statistics for Data Science', 'bC5MrFD', '10000', '1', 'els.png', 'Natus unde eaque voluptatibus magni ipsa earum. Sint voluptatum tempore necessitatibus ut quae velit. Dignissimos suscipit illum aut impedit deserunt minus.', 'Sed impedit odio porro eaque nobis. Nostrum corporis nesciunt architecto dolores. Alias aut aut maiores sed sit. Quia repudiandae reiciendis ipsa dicta explicabo.', 'Alias sit sunt fugit nihil. Quis reprehenderit quo qui velit omnis. Deserunt repudiandae dolore rem non. A rerum fugit est consequatur non deleniti illo.', 'Aut consequatur quibusdam qui. Fuga deserunt dolores molestiae aspernatur dolores architecto. Non aut vero debitis culpa sit. Laboriosam quidem et aliquid soluta.', 'odit', 'Molestiae nostrum doloremque non molestiae consequatur et nobis autem. Animi sed rerum rerum placeat. Deleniti et qui aut blanditiis odio. Sed quia nostrum vitae ut et.', 'A reiciendis sit adipisci dolorum ut. Et animi alias dolore architecto minima quae. Illum dolorem distinctio eum eius sint sint.', 'quod eligendi molestiae cum reprehenderit ut rem illum saepe blanditiis', 'Laborum ex aut enim omnis.', '4 Weeks', '4', 'Placeat ut consequatur aut voluptatem. Sit sequi quaerat sit ducimus. Quia molestias in nemo ut sint omnis ut.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(17, 'ByE59HjSV8tQ', 'SQL for Data Analysis', 'GMr7Ziu', '10000', '1', 'els.png', 'Voluptas ratione animi blanditiis modi error odio. Corporis architecto sit non temporibus corrupti. Corrupti qui neque fuga facere nam sed aliquam iure.', 'Ducimus amet quo maiores blanditiis quo officia iure. Non dolores repellat atque beatae et voluptatem. Cupiditate voluptatum aspernatur enim placeat placeat a eligendi voluptas. Aut ducimus iusto qui facere fugiat accusamus.', 'Eos consequatur aut voluptatibus reiciendis itaque repudiandae et tenetur. Quasi voluptatibus et aliquid et non itaque perspiciatis. Dicta nesciunt rem temporibus rerum et libero.', 'Repellendus ut ipsa voluptatem aliquam. Earum voluptatibus quis occaecati. Modi laboriosam aliquid molestiae voluptate voluptatem molestias est.', 'molestias', 'Consequatur quae exercitationem cum dolor officiis et. Tempore ut consequatur distinctio quos dolor. Error et illum quasi aut magnam quam consectetur iusto. Unde iste vitae officiis laudantium.', 'Sit aperiam aut adipisci nihil soluta. Fugit dicta fuga voluptatem numquam consequatur. Hic sed aut alias magni cum minus fugit.', 'vel consequatur minima odit eveniet vel doloremque necessitatibus quo beatae', 'Et aut aperiam rerum sit fugiat voluptatem itaque.', '4 Weeks', '4', 'Et vel voluptatem provident corrupti accusamus corrupti expedita. Illum iste distinctio ratione accusamus et perferendis. Magni illo qui tempore voluptatibus inventore hic. Corporis vitae nobis cumque.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(18, 'ByE59HjSV8tQ', 'Vue.js Masterclass', 'Hm7VKLN', '10000', '1', 'els.png', 'Deleniti id reprehenderit veniam dicta illo minima earum. Explicabo omnis aspernatur laudantium qui nulla esse. Suscipit aperiam voluptatem dolores cupiditate dolor. Dolor sit dolorem odit veniam nostrum.', 'Atque nostrum molestiae nam reprehenderit nulla modi. Animi rerum et at sint maxime. Et debitis et consequatur et labore animi rem.', 'Nulla facilis nisi qui quidem harum. Rerum eos perspiciatis quidem delectus occaecati ut ab. Autem vel iure nesciunt velit libero.', 'Error aut et eum et. Veniam pariatur architecto id ut eum itaque laboriosam. Enim provident ipsam commodi temporibus nobis doloremque. Ex error nostrum veniam voluptatem aspernatur.', 'iure', 'Asperiores fugiat repellat quos aut est inventore voluptates aliquid. Incidunt possimus voluptas in delectus assumenda consequatur quibusdam. Eligendi deserunt in modi.', 'Et voluptatibus est molestias dolorem mollitia sint. Temporibus numquam sunt qui ducimus. Maiores iusto itaque voluptatem est excepturi ipsum quae. Ducimus tenetur dignissimos est corporis voluptatibus accusamus.', 'alias consectetur alias quisquam et distinctio corrupti dignissimos quae ut', 'Alias ut reiciendis est et minima.', '4 Weeks', '4', 'Temporibus et placeat quae libero corrupti quia libero. Placeat quod aut suscipit hic blanditiis. Qui blanditiis sapiente repellendus et saepe necessitatibus vitae.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(19, 'ByE59HjSV8tQ', 'Vue.js Masterclass', 'Hm7VKLN', '10000', '1', 'els.png', 'Tempore sit totam aliquam laborum blanditiis voluptatem et. Soluta nam molestias officia eum aliquam ad dolor. Beatae repudiandae sed libero quae et.', 'Voluptatum voluptates veritatis consequatur qui ut quibusdam. Iste sit officia est et explicabo dolores. Et aliquam sapiente nihil. Doloribus illum alias velit et cum sed quasi magni. Nam repellendus cum dolor doloribus et et sunt provident.', 'Eos dignissimos ab officia cum et enim saepe qui. Dignissimos beatae repellat minus laborum fuga quaerat. Numquam eligendi dolor quia ipsum nisi.', 'Culpa suscipit dolorem enim. Aut rerum minima dolorem error non molestias. Enim mollitia fuga consequatur veniam.', 'magnam', 'Repellendus nulla facilis cumque quasi voluptas. Maxime corporis commodi odio nulla. Cumque sit placeat doloremque eos aliquid eum. Velit enim commodi ad et nisi unde similique.', 'Magni qui doloribus et quod qui reprehenderit ut. Recusandae non quia quam ipsum et vitae aperiam. Similique aperiam quaerat et enim vel. Quia ut rerum natus deleniti voluptates sunt incidunt. Ipsam eum et perspiciatis ut distinctio.', 'veniam et quidem sequi autem in in dicta voluptatem eos', 'Omnis voluptas et aut sequi.', '4 Weeks', '4', 'Quia quae ut occaecati. Nostrum quae natus ut vero. Occaecati quibusdam eius atque blanditiis et ea.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(20, 'ByE59HjSV8tQ', 'Typography and Layout Essentials', 'pXftY6G', '10000', '1', 'els.png', 'Dolorem corporis eum praesentium dicta distinctio. Voluptas ut corrupti atque aut. Cum voluptatem dolore qui eaque. Debitis et est et exercitationem sequi.', 'Quos tenetur dolorum excepturi est quo. Quis consequatur harum molestiae quidem iste molestiae.', 'Culpa quo eveniet veniam qui possimus ipsa. Natus eum omnis optio totam officia nisi. Saepe veniam vero non dicta mollitia quos suscipit. Impedit veritatis reiciendis quia.', 'Porro occaecati rem suscipit natus. Consequatur fuga molestiae asperiores quam earum omnis qui. Voluptatem voluptas molestias dignissimos debitis. Qui repellat molestiae ab.', 'id', 'Neque libero voluptatem recusandae natus nobis et id. Quia tempora ut ipsam enim dolores expedita recusandae voluptatem. Eos animi provident et autem. Officiis voluptate omnis est veniam.', 'Quia aut voluptatibus quo occaecati. Velit suscipit veritatis incidunt et. Sunt dolorem consequatur dolores corrupti dolorum. Error consectetur eligendi magnam dignissimos.', 'consequuntur ut nemo eos libero ut voluptates quidem qui et', 'Eos quis architecto doloribus qui sed voluptas similique.', '4 Weeks', '4', 'Aut rerum omnis cum et excepturi eligendi. Ad et voluptatem quas sint aut cumque. Recusandae voluptatem facilis blanditiis. Omnis molestiae maxime repellat officiis doloribus.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(21, 'ByE59HjSV8tQ', 'Django Web Development Bootcamp', 'Hm7VKLN', '10000', '1', 'els.png', 'Voluptas labore deserunt blanditiis quia temporibus dicta. Incidunt quis corrupti totam.', 'Odit aut nemo sunt necessitatibus eos fuga nobis. Itaque ea et autem delectus sunt. Quasi impedit facilis mollitia quo sequi eum earum consequatur. Iure veniam temporibus et ad nesciunt non.', 'Atque quibusdam velit sed id dolorem nemo. Voluptas consequuntur labore sit rem deserunt dolor. Ipsa earum est veritatis. Delectus est dolores consectetur quia dicta quod. Impedit vel provident similique ipsa necessitatibus possimus asperiores rerum.', 'Quaerat facere minima quia incidunt enim doloribus. Est voluptates voluptates harum voluptatum. Sapiente accusamus nemo doloribus consequatur. Consequatur alias perspiciatis asperiores est et.', 'veniam', 'Corporis voluptatem numquam sequi eum sit magnam aut. Odit magni voluptas saepe omnis corporis rem.', 'Labore iure laudantium et fugiat voluptatem dolores. In quas incidunt quis sapiente cum. Voluptas hic expedita sed id ut vel rerum.', 'quam laudantium illum repudiandae quod quo qui qui fugit repellat', 'In et officia reiciendis et qui qui.', '4 Weeks', '4', 'Saepe molestiae sit qui eos. Nihil debitis optio eum quis odio veritatis quidem. Praesentium distinctio quia labore.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(22, 'ByE59HjSV8tQ', 'Web Performance Optimization', 'Hm7VKLN', '10000', '1', 'els.png', 'Qui qui tempore est sed harum in. Nulla voluptatum quidem atque sit pariatur. Voluptas deleniti dicta consequatur. Reprehenderit ullam id repudiandae rerum maiores.', 'Soluta unde qui necessitatibus magnam minima est quia. Consequatur sed numquam repudiandae fuga est natus nam. Laboriosam distinctio aliquam beatae eum nostrum consequatur consequuntur esse.', 'Provident consectetur aut quia aut sit debitis ipsam. Accusantium perspiciatis et sed quae. Neque voluptates eos perspiciatis quae maxime sapiente magnam eaque. In architecto aliquid aliquam sit.', 'Est et sint voluptatum quo. Ea quasi est error sit rerum modi. Voluptate aut eligendi fugiat quae quia rerum. Ut magnam eius eveniet exercitationem placeat.', 'laboriosam', 'Aut veniam quae velit et. Commodi nostrum at et voluptatem sint soluta quia. Nostrum facere at qui ratione quo et ut. Dignissimos magnam culpa numquam.', 'Unde repellat voluptates dolor. Esse sunt velit consectetur sed et nulla consequatur similique. Et tempora ut ad. Atque quod rerum tempora sed dolor et.', 'eum excepturi voluptatum eveniet mollitia tempore enim non quisquam aliquam', 'Minima dignissimos voluptates repudiandae ea inventore dolores est.', '4 Weeks', '4', 'Sunt temporibus totam reiciendis ut. Cumque itaque ad vitae in error. Totam eum itaque modi doloremque beatae. Occaecati amet voluptatem quis accusantium ea libero autem.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(23, 'ByE59HjSV8tQ', 'Power BI Dashboard Design', 'V6HodKJ', '10000', '1', 'els.png', 'Magnam eum autem unde culpa voluptas ducimus doloribus. Vel voluptatibus aut ab omnis. Saepe voluptates et omnis omnis. Laudantium ex pariatur repellendus et impedit tempore.', 'Laboriosam eos sunt voluptatum qui assumenda reprehenderit odio aut. Nihil laborum vel dolor.', 'Repellendus explicabo magnam quas quaerat ducimus esse. Accusantium explicabo facilis laudantium sapiente sint et libero. Error iure recusandae ullam sint eum.', 'Commodi iure commodi voluptatem quis recusandae. Qui dolorum dolor perspiciatis. Ut ex temporibus neque asperiores sunt. Sequi error ex corporis non explicabo non exercitationem. Est quibusdam et nam magni ut tempore.', 'debitis', 'Sunt voluptatem modi in eum quia eos. Sint saepe qui ratione. Suscipit ut et in voluptatem molestiae voluptas.', 'Rerum et molestiae officia impedit sit sunt tempora qui. Debitis aut voluptatum et veniam soluta ipsam. Quis hic voluptas nobis.', 'ipsa suscipit aspernatur non sit praesentium dicta non minima omnis', 'At consequuntur fugit et ut dolores.', '4 Weeks', '4', 'Eos qui labore consectetur qui et veritatis. Quas sunt iste facere voluptatem occaecati corrupti omnis. Non at sint nesciunt laboriosam qui enim quod.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(24, 'ByE59HjSV8tQ', 'Automation Anywhere Essentials', 'exD4HQP', '10000', '1', 'els.png', 'Reiciendis sit ad temporibus qui quia accusantium. Officia sapiente inventore quaerat consequatur fugit ipsam tempora. Maxime repellat inventore repudiandae ipsa nostrum. Enim quia corrupti voluptatem iusto.', 'Ut officiis officia odio occaecati neque dolore provident ut. Similique optio in fugiat molestias ea eos. Quos aut temporibus rerum sed sit.', 'Animi corrupti voluptas cupiditate sed. Doloremque ea optio recusandae quia. Est laudantium quod non soluta recusandae.', 'Ea accusantium quam quaerat ratione ipsam consequatur amet dolores. Sed excepturi asperiores dolorem reiciendis sed consequatur debitis consectetur. Qui autem quas assumenda incidunt. Quis totam eius voluptate et velit distinctio magnam eos. Voluptatem modi dolor autem ratione est.', 'nulla', 'Voluptatibus omnis est saepe voluptas nobis nulla blanditiis consequuntur. Molestias ipsa necessitatibus vero architecto qui et. Aspernatur libero qui non magni consequatur a.', 'Aut repudiandae est ea et consectetur. Tempore quaerat accusantium quia perferendis rem tempore ex. Sint ut sint voluptatibus et repellendus ab. Fugiat vitae eum nulla pariatur vel sunt et.', 'nesciunt aut est consequuntur et est repellat voluptatem sit facere', 'Assumenda sed eos sed atque totam.', '4 Weeks', '4', 'Autem enim eligendi voluptatem non mollitia dolores cupiditate enim. Et magnam omnis doloremque dicta tempora dolorem nihil. Sint sed aut rerum quia. Aperiam sint expedita et.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(25, 'ByE59HjSV8tQ', 'Digital Branding Essentials', 'Rqo2KOn', '10000', '1', 'els.png', 'Quia error vitae voluptas voluptate voluptates. Cupiditate numquam assumenda rem in quo laudantium. Alias corporis esse saepe mollitia tenetur laudantium itaque. Impedit fugit quae qui.', 'Expedita rerum quis incidunt. Cupiditate rerum in distinctio aut. Veniam accusamus deserunt sit veniam omnis suscipit nam.', 'Rerum voluptas veritatis odio harum officiis ut. Quam rerum itaque deserunt tempore. Fugiat esse corrupti aut rerum et ut ut. Officia qui quasi non aut sed et aut itaque.', 'Architecto aperiam sunt et dolorum provident quidem maiores. Ut illum nam vitae. Molestiae temporibus eos neque itaque beatae maxime suscipit.', 'velit', 'Rerum dicta et aspernatur itaque non perferendis. Quod et quis laborum eius suscipit laborum. Et dolorum est quis voluptas. Adipisci vitae dolor aliquid dolorem illum perspiciatis quia.', 'Ipsa et harum ut eum. Cumque aliquam unde quis eum odit. Sint aut ab ut consequatur voluptate.', 'reiciendis dolore laboriosam pariatur est ut dolores totam et quibusdam', 'Voluptatem excepturi labore rerum sit ut aut.', '4 Weeks', '4', 'Est ut amet rerum ex aliquid. Laudantium consequatur laudantium ut id aspernatur ut. Eum enim eum dicta omnis autem.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(26, 'ByE59HjSV8tQ', 'Multi-Cloud Deployment Strategies', 'i3duKSm', '10000', '1', 'els.png', 'Voluptatibus et consequatur qui et est. Repudiandae animi ipsa nesciunt. In id eos dolor laboriosam illum sunt non. Ut consequatur corporis similique.', 'Cum hic aliquid ea eos necessitatibus culpa. Voluptas debitis dolor sequi aut corporis dolorem. Neque hic et aspernatur maxime. Est libero aut maxime non et.', 'Blanditiis id mollitia ipsam soluta. Sunt cumque et aut aliquam perspiciatis.', 'Quo asperiores placeat similique ut deleniti. Quia hic totam voluptatem eum minus. Ut officia alias qui.', 'sapiente', 'Quia optio voluptatem quod. Non sit aspernatur doloribus consectetur explicabo facilis voluptatem. Molestias quia alias repudiandae vel est voluptas at. Est error aperiam earum laudantium itaque voluptatibus aspernatur.', 'Ullam voluptates voluptate totam quasi. Iure non in quas maxime sunt. Officia sapiente rerum quia possimus sint sapiente aut. Optio rem dolorem odio maxime ut et.', 'saepe est ipsum quia quia accusamus expedita sed qui quibusdam', 'Labore quis explicabo pariatur et corrupti molestias eaque.', '4 Weeks', '4', 'Autem et eligendi quia iste quis aliquid sit. Autem dolorem et rerum ipsa enim excepturi laborum inventore. Ab inventore deserunt sed nulla.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(27, 'ByE59HjSV8tQ', 'Next.js for Production Apps', 'Hm7VKLN', '10000', '1', 'els.png', 'Quod repellat tempora rerum natus aut maiores. Enim voluptates harum in excepturi. Sed necessitatibus tempore corrupti illo.', 'Fuga sunt tempora nisi corrupti exercitationem omnis a similique. Dolor et asperiores laboriosam aperiam est a.', 'Rerum quis officia id et. Molestias aut dignissimos veritatis eos et vel. Harum voluptatibus iure voluptatem itaque.', 'Molestiae dolorum animi ratione illum ab ad. Dolorem perferendis ut vel qui optio autem laboriosam. Ut odit esse voluptatem dolorum consequuntur illum modi.', 'reprehenderit', 'Et et provident debitis fugiat ut aut saepe facere. Labore natus assumenda placeat et magnam. Repellat placeat ut ducimus architecto porro eum minima.', 'Et vitae ut quidem tenetur cumque labore doloremque molestiae. Sapiente numquam atque harum veritatis adipisci. Culpa et aut quaerat aspernatur exercitationem et corrupti. Aut ea distinctio rerum quo blanditiis dolores. Et illo harum consectetur libero corporis et recusandae.', 'saepe accusamus animi explicabo deserunt sit soluta sunt qui officia', 'Aperiam in sequi odit asperiores porro.', '4 Weeks', '4', 'Autem qui distinctio ut consequatur. Enim molestias nam mollitia fuga saepe. Delectus libero est sed laboriosam magnam aliquam quod. Eum soluta odit quas quia qui eius. Dignissimos possimus explicabo ipsa numquam aut.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(28, 'ByE59HjSV8tQ', 'Product Discovery Techniques', 'HCJPokK', '10000', '1', 'els.png', 'Eos sit corrupti hic eum quod. Optio omnis suscipit natus quisquam. Sint eos omnis debitis ut et natus consequatur.', 'Dolores voluptas sed totam laborum possimus rerum. Omnis in ipsum et veniam in atque et. Voluptatum molestias eius qui libero. Est sequi fugit molestias ut voluptas.', 'Ut at nihil ut enim qui eum commodi. Molestiae laboriosam harum fugit vel. Quibusdam et quidem reiciendis odio tempore beatae.', 'Laboriosam reiciendis sit porro. Et quae est sunt et expedita. Provident autem nihil vel totam dicta vel.', 'iste', 'Blanditiis eos dolorem est culpa et velit nihil similique. Illum deserunt ipsam autem dolor nihil aut voluptatum doloribus. Officia a voluptatem aut dolorum incidunt.', 'Ut laborum voluptas sunt. Enim et est qui quis. Fugiat ut error qui sit quia laudantium nostrum.', 'aut voluptatem exercitationem temporibus necessitatibus veritatis fugiat ab fugit dolorem', 'Magnam nihil perspiciatis nobis fugit aspernatur velit.', '4 Weeks', '4', 'Fugiat iusto dolor dolor expedita. Provident est facere nobis velit sed. Rem quidem qui omnis ea facilis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(29, 'ByE59HjSV8tQ', 'SQL for Data Exploration', 'bC5MrFD', '10000', '1', 'els.png', 'Earum quos temporibus ut voluptatibus voluptatum eaque id officia. Quam alias ad aut aut quia. Omnis aut ratione molestias quia sit est. Quidem porro quam at ut.', 'Accusamus sunt repellat aperiam est odit consectetur sapiente veniam. Magni ipsa dolores ea expedita omnis inventore. Distinctio accusamus consequatur doloremque autem.', 'Nihil voluptatibus mollitia in et sed. Explicabo libero et odit cumque enim id. In repellat cupiditate et incidunt.', 'Rem quia animi vel in debitis. Illo est distinctio minima voluptate fugiat ut repudiandae et. Dignissimos voluptatem modi soluta ad dicta omnis rerum. Facilis cum assumenda atque minus.', 'consequatur', 'Officia voluptas quod asperiores quia est quisquam ullam. Ab odit consequatur aut sit reprehenderit id ullam. Consequuntur quidem ullam qui vitae sed voluptatum quidem. Suscipit eligendi officia enim quibusdam nulla.', 'Ab dolores eveniet cumque veritatis. Consequuntur voluptas ex nihil. Non dignissimos corrupti dolorem ut delectus odit aperiam. Rerum ipsum ipsam aut similique facere vero modi. Ex nostrum totam ducimus et sed libero qui.', 'ipsam adipisci corrupti et similique consequatur voluptas architecto in excepturi', 'Consequatur sint ullam nobis reiciendis.', '4 Weeks', '4', 'Quia quis voluptas commodi labore. Impedit omnis ea velit quidem itaque. Nihil deleniti saepe deserunt suscipit ut aut atque.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL);
INSERT INTO `courses` (`course_id`, `slug`, `course_name`, `programSlug`, `course_price`, `user_id`, `banner`, `basic_requirements`, `course_outline`, `learning_module`, `course_schedule`, `training_type`, `payment_structure`, `course_overview`, `course_technologies`, `packages_included`, `duration`, `ratings`, `benefits`, `course_discount`, `course_introduction`, `updated_at`, `created_at`, `deleted_at`) VALUES
(30, 'ByE59HjSV8tQ', 'AWS Solutions Architect', 'i3duKSm', '10000', '1', 'els.png', '\n                    <p>This course is intended for IT professionals, developers, and system administrators with a basic understanding of cloud computing concepts. Familiarity with networking, virtualization, and general infrastructure principles will be beneficial.</p>\n                    <p>Participants should be comfortable navigating web-based dashboards and command-line interfaces. Prior exposure to AWS services is helpful but not required, as foundational topics will be covered in the early modules.</p>\n                    <p>A laptop with internet access and the ability to create an AWS Free Tier account is essential for completing hands-on labs and exercises.</p>\n                ', '\n                    <p>The curriculum is designed to align with the AWS Certified Solutions Architect – Associate exam and includes:</p>\n                    <ol>\n                        <li><strong>Cloud Fundamentals:</strong> Overview of AWS global infrastructure, pricing models, and shared responsibility model.</li>\n                        <li><strong>Core Services:</strong> Deep dive into EC2, S3, RDS, IAM, and VPC configuration and management.</li>\n                        <li><strong>Security & Identity:</strong> Implementing IAM roles, policies, MFA, and encryption best practices.</li>\n                        <li><strong>High Availability & Scalability:</strong> Load balancing, auto-scaling, and fault-tolerant architecture design.</li>\n                        <li><strong>Infrastructure as Code:</strong> Using CloudFormation to automate resource provisioning and manage stacks.</li>\n                        <li><strong>Monitoring & Optimization:</strong> Leveraging CloudWatch, Trusted Advisor, and cost management tools.</li>\n                    </ol>\n                ', '\n                    <p>Each module combines theoretical instruction with practical application:</p>\n                    <ul>\n                        <li>Hands-on labs using the AWS Management Console and AWS CLI to deploy and configure services.</li>\n                        <li>Architecture design challenges simulating real-world business scenarios.</li>\n                        <li>Weekly quizzes and review sessions to reinforce key concepts and exam readiness.</li>\n                        <li>Final capstone project involving the design of a secure, scalable, and cost-effective cloud solution.</li>\n                    </ul>\n                ', '\n                    <p>The course runs for <strong>8 weeks</strong> with the following weekly structure:</p>\n                    <ul>\n                        <li>Two instructor-led lectures covering AWS services, architecture patterns, and exam strategies.</li>\n                        <li>One lab session focused on deploying and managing AWS resources.</li>\n                        <li>Certification preparation begins in week 6, including mock exams and review workshops.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This intensive program prepares learners for the AWS Solutions Architect certification by providing hands-on experience in designing and deploying cloud infrastructure. Students will gain a deep understanding of AWS services and architectural best practices.</p>\n                    <p>By the end of the course, participants will be equipped to build secure, scalable, and resilient cloud solutions and confidently pursue AWS certification.</p>\n                ', 'AWS, CloudFormation, IAM, EC2, S3, VPC, CloudWatch', NULL, '8 Weeks', '4', '\n                    <ul>\n                        <li>Gain hands-on experience with core AWS services and architecture design.</li>\n                        <li>Prepare for the AWS Solutions Architect – Associate certification exam.</li>\n                        <li>Build a portfolio of cloud infrastructure projects demonstrating real-world skills.</li>\n                        <li>Enhance career opportunities in cloud engineering, DevOps, and IT architecture roles.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(31, 'ByE59HjSV8tQ', 'Data Wrangling with Pandas', 'bC5MrFD', '10000', '1', 'els.png', 'Voluptas sequi est quis voluptate vel vitae nobis. Ut nihil aut facilis.', 'Adipisci aut et sit iusto eum. Et consequatur qui esse blanditiis dolorum consequatur vel aut. Dolorem ex provident consequatur ut velit.', 'In aperiam voluptas odit beatae nisi ut. Voluptatibus quod quidem omnis mollitia. Occaecati quasi quam fugit et. Unde temporibus expedita sunt.', 'Est odit eum voluptatem dicta. Adipisci non alias sapiente. Et ipsum quibusdam quasi voluptas dolor nihil incidunt.', 'distinctio', 'Esse praesentium blanditiis rem quia. Fuga labore aut dolorem ut eum consectetur quisquam. Neque esse necessitatibus saepe laboriosam est dolore fugit. Eveniet numquam consectetur voluptatem debitis corporis.', 'Voluptate ipsa quasi quia alias enim quisquam id nihil. Et at fugit dolorem tenetur. Exercitationem sit unde delectus quia et debitis. Omnis eveniet assumenda sint rerum corrupti.', 'facere qui fugiat eligendi sit dolor ab et quasi explicabo', 'Nesciunt et maiores ut sunt.', '4 Weeks', '4', 'Et odit sunt quaerat est. Minima aliquam qui consectetur consequatur temporibus. Magni nisi doloribus qui dolore ipsam.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(32, 'ByE59HjSV8tQ', 'Excel for Business Analytics', 'V6HodKJ', '10000', '1', 'els.png', 'Aut sit sint qui sed dolorem nostrum quia. Voluptas enim qui non. Ratione maiores in eos et. Eum et veniam quasi porro.', 'Deserunt quo autem qui optio. Facere sunt ipsam consequatur voluptatem ducimus doloribus. Cumque recusandae sint beatae eos nemo. Vel dolor hic nemo voluptas impedit et beatae.', 'Odio voluptatem voluptates error fuga natus dolores et. Perspiciatis voluptatum velit est reiciendis quos et expedita. Provident dolorem id ducimus corrupti maxime dolorem.', 'Labore facilis perspiciatis eum explicabo perferendis. Delectus delectus quos corrupti aliquid suscipit facere tempore omnis. Tempore soluta magnam suscipit et non ab.', 'modi', 'Voluptatem nostrum debitis occaecati delectus. Cumque ut quam tempore voluptatem.', 'Ipsum autem soluta est eos qui sed. Saepe voluptas mollitia numquam.', 'asperiores pariatur excepturi velit velit totam ad et ut magni', 'Quia non aperiam non eligendi exercitationem sed debitis.', '4 Weeks', '4', 'Ut est nam architecto nostrum. Corporis veritatis ad quam voluptas. Voluptatum sit doloremque nostrum iure voluptatem accusantium soluta.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(33, 'ByE59HjSV8tQ', 'Product Lifecycle Management', 'HCJPokK', '10000', '1', 'els.png', 'Qui vero qui nulla qui. Ipsa ipsam vel voluptas iste necessitatibus et exercitationem. Recusandae error dolorum et voluptatem magnam.', 'Natus aut nihil sit velit. Nesciunt ut rerum vero voluptatem alias et quo.', 'Sit nostrum consequatur distinctio architecto minus vel vel. Tempore dolorem et autem quis voluptatum mollitia praesentium. Eaque quod consectetur voluptas praesentium dolorem voluptatem. Doloremque quae quia ullam rem aliquid a.', 'Nobis et non perspiciatis molestias. Cum delectus aperiam ducimus est ut ipsam reiciendis tempora. Reiciendis doloremque nostrum ea et quidem eligendi iure. Eveniet qui vitae laboriosam delectus laborum dignissimos tenetur itaque.', 'ut', 'Nam eos eos quam autem. Corporis enim perspiciatis mollitia tenetur nemo accusantium. Aut quis eum accusantium excepturi eum non. Id inventore nulla animi molestias consectetur.', 'In rerum dolorem molestias nihil ipsam. Fuga est mollitia provident aperiam saepe aut soluta.', 'possimus omnis adipisci sint nihil qui omnis officiis in est', 'Ratione atque repellat a enim earum sed et.', '4 Weeks', '4', 'Odit aut eos enim aut voluptates consequatur aut minus. Consequatur sed reiciendis omnis minus praesentium. Beatae in ducimus quia consequuntur facere facilis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(34, 'ByE59HjSV8tQ', 'Exploratory Data Analysis', 'bC5MrFD', '10000', '1', 'els.png', 'Architecto ullam delectus earum et ratione harum similique. Autem sint rerum ipsam reprehenderit placeat dolorem qui. Sed molestiae illo iusto quam. Vero numquam sapiente deleniti repudiandae vel.', 'Ab recusandae reiciendis quo esse est animi porro doloremque. Odit tenetur quas maxime totam ipsam temporibus sit aliquid. Est similique ab neque dolor non modi temporibus neque. Voluptatem consequatur tempore doloribus incidunt. Est voluptas quia quas ad.', 'Tempora animi et id omnis quam. Molestiae laborum iure reiciendis. Ea odio sequi laborum eum ducimus rerum.', 'Vel nostrum sed possimus sit repellendus occaecati quo. Accusantium odio voluptas recusandae in. Veritatis molestias sed dolore omnis omnis. Voluptatem pariatur itaque et atque.', 'dolor', 'Incidunt et quidem temporibus exercitationem laboriosam maiores. Ad commodi quia et quo. Recusandae quidem nihil aut et. Quod suscipit totam sed molestiae amet. Neque omnis sequi dignissimos nihil voluptas.', 'Qui voluptates similique est iure fugit et quo. Ullam ipsam quo perspiciatis quis. Nostrum eum vel nulla incidunt.', 'cum dolorum non tempora minima quia odio voluptate corporis consequatur', 'Consequatur nesciunt occaecati cum repellat quam deserunt aut.', '4 Weeks', '4', 'Deleniti incidunt quia architecto. Placeat facere ut sed nobis et pariatur sit. Fuga rerum aspernatur ex maiores est enim dolores. Mollitia doloribus architecto ut debitis sapiente et autem qui.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(35, 'ByE59HjSV8tQ', 'Microservices Architecture', 'uJj4OgP', '10000', '1', 'els.png', 'Neque suscipit ut quo ut maxime. Aut aut quidem doloribus qui aut nobis et. Et dolorem corporis eum.', 'Inventore itaque asperiores incidunt ad aperiam aut. Deleniti illum corporis non est quis doloremque. Cupiditate eum eius ex commodi dolores est asperiores. Doloribus nemo explicabo sint facere sed voluptas. Officiis rem illum culpa.', 'Ut veritatis accusantium dolor iure. Voluptatum qui veniam voluptatibus. Omnis ut est corrupti qui quia.', 'Iste ad soluta maiores totam. Assumenda quisquam delectus officia aperiam. Voluptas quas voluptatem magnam in recusandae.', 'unde', 'Aperiam quo officiis blanditiis et sequi provident ut quia. Corporis tenetur eum quibusdam doloribus. Accusantium accusamus voluptatem fugiat maiores.', 'Quaerat eos consectetur ut quidem aut ullam odit eum. Et cupiditate id est animi non. Iusto eum cumque consequatur eum.', 'autem ratione ut molestias cum impedit qui excepturi commodi at', 'Quos illum quia excepturi nisi.', '4 Weeks', '4', 'Ut occaecati nemo distinctio at consequuntur. Itaque est optio laborum voluptas sed. Dolores et voluptate nobis aliquid expedita nobis. Placeat repudiandae beatae cupiditate blanditiis fugit eveniet dolores tempore.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(36, 'ByE59HjSV8tQ', 'Refactoring Legacy Code', 'uJj4OgP', '10000', '1', 'els.png', 'Sit sit iste molestias adipisci accusantium at accusamus. Ea porro quod ut consectetur delectus nulla. Facere et et sunt totam accusantium rerum. Praesentium blanditiis laudantium cum.', 'Nihil numquam fugiat culpa. Dolorem ipsum dolore nobis pariatur exercitationem. Voluptatem mollitia sit quia incidunt optio alias blanditiis.', 'Ut iure in nisi et. Aut veritatis magni reprehenderit. A ducimus deserunt dolorem aut expedita omnis a. Quis alias ratione eos praesentium.', 'Nobis quod repellendus ea consectetur. Sint dicta dolor sed. Veniam aut ut explicabo blanditiis eveniet accusamus fugit.', 'deserunt', 'Nulla id at doloremque officia sed deleniti atque necessitatibus. Aspernatur aut hic temporibus enim perferendis ex. Non corrupti ratione laudantium fugit accusantium.', 'Natus nobis ut error repudiandae temporibus. Consequuntur natus qui dicta doloribus quo quos consequatur. Veniam et et ut voluptas nam quasi eos recusandae. Quibusdam qui nesciunt earum explicabo eaque amet ut.', 'assumenda laborum debitis ipsam est impedit occaecati maxime voluptatem modi', 'Debitis illo optio occaecati placeat veniam.', '4 Weeks', '4', 'Corrupti sint hic eligendi velit nostrum ullam ad voluptatem. Voluptates dolorem voluptatem omnis a magni perferendis. Voluptas perspiciatis voluptatem illum facere aut. Officia est eos est tempora rem quas optio.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(37, 'ByE59HjSV8tQ', 'Data Modeling with ER Diagrams', 'GMr7Ziu', '10000', '1', 'els.png', 'Aperiam quod ipsum sapiente neque numquam. Atque pariatur illum aliquid numquam error illo perspiciatis. Soluta dolore minima officia dolores aut.', 'Veritatis atque molestiae in. Est sit unde voluptatum occaecati enim. Et vitae sunt eveniet ea et nostrum natus. Dolorem veniam et ipsum quia incidunt. Iste maxime magni in porro quia.', 'Rem aperiam sequi iusto ipsum consequatur. Voluptate officiis veritatis harum asperiores eum dicta. Est animi quaerat inventore dolorem aut facere id.', 'Ut nemo neque eos exercitationem dolor natus. Consequuntur repellat in id nihil nisi et dolor temporibus. Animi inventore deleniti ullam. Quasi quo ab nulla qui.', 'nihil', 'Iste delectus tempore necessitatibus. Ut iste quaerat numquam eum consequatur dolorem. Perferendis soluta alias possimus illo fugit mollitia esse.', 'Quis porro inventore molestiae soluta perferendis distinctio. Est est eaque quas. Omnis at consectetur aliquam dignissimos.', 'officiis aut eum ex neque error sequi laudantium vel aut', 'Laborum dolorem sed quia ullam saepe.', '4 Weeks', '4', 'Ut id omnis sequi debitis. Distinctio possimus omnis esse ea consectetur ex ex et. Vero et quisquam eos minus quisquam consequatur. Soluta corrupti qui consequatur enim.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(38, 'ByE59HjSV8tQ', 'SQL for Business Analysts', 'V6HodKJ', '10000', '1', 'els.png', 'Iusto et officiis ut mollitia minima. Dolore unde error impedit sapiente quod velit velit laudantium.', 'Voluptas asperiores quibusdam modi voluptas. Eos sed impedit quia libero commodi. Sed explicabo repudiandae quae est perferendis eum. Exercitationem et aspernatur ut.', 'Ipsum eligendi tempore est et. Asperiores earum fugit reprehenderit commodi ex vel. Aspernatur necessitatibus inventore minima ducimus nihil. Sed eaque eius voluptas quia.', 'Quis qui voluptatem consequatur illo autem voluptas beatae provident. Quia modi ut sed voluptatibus vero. Aut beatae vel dicta ut est eos sed.', 'voluptas', 'Consequuntur et odio sapiente quisquam odit atque. Et aut ducimus ut aliquid laborum error iure porro. Vel quidem animi iusto in possimus ea totam. Cum aut voluptate neque et.', 'Praesentium id animi blanditiis perferendis. Omnis aperiam autem ad repellendus quasi at. Delectus atque sint labore ut eum similique. Provident ut sed nihil labore omnis alias eius.', 'facilis ad excepturi quo error ipsum facilis consectetur repudiandae commodi', 'Consectetur ut quam ea ducimus.', '4 Weeks', '4', 'Consequatur laboriosam dolorem quibusdam et eum. Voluptas corporis qui et minus itaque. Magni vel tenetur sint pariatur eaque. Aut tempora architecto dolorem facilis et et.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(39, 'ByE59HjSV8tQ', 'Automation Anywhere Essentials', 'exD4HQP', '10000', '1', 'els.png', 'Consequatur autem voluptatem facilis qui officiis. Totam voluptatem est voluptates beatae accusantium debitis aperiam.', 'Maxime veniam suscipit doloremque et ut ut eius. Reprehenderit magnam debitis voluptatibus aut odio. Eum autem modi fugit. Dolores magnam quia et nihil.', 'Quae itaque qui corrupti qui inventore labore harum autem. Corrupti exercitationem officiis ut in molestiae ratione voluptatem eaque. Quasi error magnam recusandae et dolore minus unde.', 'Possimus consequatur perferendis qui placeat officia et debitis. Ipsam officia est voluptatem et quo et vel.', 'voluptas', 'Fuga voluptatem quidem temporibus est. Non nemo assumenda quia provident sit voluptas vero.', 'Vitae impedit dicta a rerum corporis. Fuga nihil exercitationem itaque dolore est. Placeat esse neque perferendis sit voluptatem eveniet tenetur.', 'voluptas id a aperiam magni cumque sapiente dicta autem neque', 'Dignissimos qui qui deleniti sit.', '4 Weeks', '4', 'Id corrupti reiciendis ad perferendis natus. Illum sapiente ipsum deserunt quaerat. Accusamus labore ipsam eum non et exercitationem culpa. Nam ex est ut nesciunt. Et architecto suscipit dolor optio commodi tenetur ut id.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(40, 'ByE59HjSV8tQ', 'Metrics-Driven Product Decisions', 'HCJPokK', '10000', '1', 'els.png', 'Consectetur sint nesciunt excepturi animi vel. Quo veniam perferendis ipsum explicabo optio voluptatem. Qui officia facere vero laboriosam occaecati dolore harum. Cupiditate tempora enim et recusandae id eum ad.', 'Aperiam deleniti molestiae exercitationem temporibus et. Aut modi optio ut quis velit voluptas. Sunt autem eum rerum eaque dolores. Veritatis suscipit pariatur est consequatur. Provident tempora a ipsum repellat sit et natus.', 'Et excepturi et quisquam. Aliquid adipisci dolores dolore nobis aliquam. Quas dolores enim et inventore beatae. Voluptatem ut reiciendis reprehenderit.', 'Et voluptas similique molestiae. Magnam assumenda in quidem quo quidem minima et.', 'omnis', 'Eius est aspernatur voluptas qui quia. Asperiores fuga necessitatibus deserunt incidunt dolores. Quia voluptatem dignissimos ut recusandae fugiat iste. Et quia molestiae nobis excepturi suscipit. Sunt maxime id nesciunt in aliquid delectus.', 'Enim autem aut sit officia et. Consequuntur sequi voluptas non culpa rerum qui dignissimos. Rerum et molestiae sit voluptatem aliquam enim. Alias mollitia consequatur molestias sunt provident repudiandae.', 'quia repellat itaque rerum sit nam natus molestias quia officia', 'Et ut modi nisi provident.', '4 Weeks', '4', 'Quia voluptate beatae molestias ipsum est. Consequatur dolorem repellendus quas perspiciatis in. Exercitationem enim quae non temporibus accusantium. Aut explicabo fuga magnam minima consequatur exercitationem pariatur. Sit tenetur eveniet molestias quo doloribus.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(41, 'ByE59HjSV8tQ', 'Building APIs with Node.js', 'Hm7VKLN', '10000', '1', 'els.png', 'Perferendis sed recusandae sed tempora. Accusamus eius accusantium neque provident autem quo minus. Ex beatae autem quod tenetur adipisci.', 'Non ducimus iste molestiae et doloribus molestiae. Facere velit velit ut culpa et voluptatem.', 'Non commodi explicabo quis nulla. Voluptatum reprehenderit suscipit earum dolorem velit est. Esse dolor id nostrum velit quisquam. Similique aut neque ut expedita soluta neque.', 'Aspernatur excepturi vel rerum velit reiciendis eum quidem nobis. Corporis inventore id molestiae at distinctio omnis. Nobis nostrum porro totam dolore. Quo reprehenderit nesciunt quis ipsum perspiciatis dicta. Inventore necessitatibus provident aliquid voluptate ab.', 'tempora', 'Ut molestias quibusdam nisi dolores non. Qui doloremque magnam iusto doloremque aperiam maiores. Alias excepturi non aspernatur. Enim adipisci voluptatem libero non voluptatem.', 'Commodi perspiciatis tempore omnis omnis. Amet esse omnis aut fugiat dicta placeat ut laudantium. Sint corporis sit vero aut quisquam quae.', 'incidunt autem asperiores dolor eum rerum quas exercitationem sit eos', 'Possimus qui voluptatibus eligendi repudiandae.', '4 Weeks', '4', 'Est corporis esse alias repellendus. Porro rem corporis illo qui sint id. Voluptatem velit recusandae eaque velit molestiae et.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(42, 'ByE59HjSV8tQ', 'AWS Solutions Architect', 'i3duKSm', '10000', '1', 'els.png', '\n                    <p>This course is intended for IT professionals, developers, and system administrators with a basic understanding of cloud computing concepts. Familiarity with networking, virtualization, and general infrastructure principles will be beneficial.</p>\n                    <p>Participants should be comfortable navigating web-based dashboards and command-line interfaces. Prior exposure to AWS services is helpful but not required, as foundational topics will be covered in the early modules.</p>\n                    <p>A laptop with internet access and the ability to create an AWS Free Tier account is essential for completing hands-on labs and exercises.</p>\n                ', '\n                    <p>The curriculum is designed to align with the AWS Certified Solutions Architect – Associate exam and includes:</p>\n                    <ol>\n                        <li><strong>Cloud Fundamentals:</strong> Overview of AWS global infrastructure, pricing models, and shared responsibility model.</li>\n                        <li><strong>Core Services:</strong> Deep dive into EC2, S3, RDS, IAM, and VPC configuration and management.</li>\n                        <li><strong>Security & Identity:</strong> Implementing IAM roles, policies, MFA, and encryption best practices.</li>\n                        <li><strong>High Availability & Scalability:</strong> Load balancing, auto-scaling, and fault-tolerant architecture design.</li>\n                        <li><strong>Infrastructure as Code:</strong> Using CloudFormation to automate resource provisioning and manage stacks.</li>\n                        <li><strong>Monitoring & Optimization:</strong> Leveraging CloudWatch, Trusted Advisor, and cost management tools.</li>\n                    </ol>\n                ', '\n                    <p>Each module combines theoretical instruction with practical application:</p>\n                    <ul>\n                        <li>Hands-on labs using the AWS Management Console and AWS CLI to deploy and configure services.</li>\n                        <li>Architecture design challenges simulating real-world business scenarios.</li>\n                        <li>Weekly quizzes and review sessions to reinforce key concepts and exam readiness.</li>\n                        <li>Final capstone project involving the design of a secure, scalable, and cost-effective cloud solution.</li>\n                    </ul>\n                ', '\n                    <p>The course runs for <strong>8 weeks</strong> with the following weekly structure:</p>\n                    <ul>\n                        <li>Two instructor-led lectures covering AWS services, architecture patterns, and exam strategies.</li>\n                        <li>One lab session focused on deploying and managing AWS resources.</li>\n                        <li>Certification preparation begins in week 6, including mock exams and review workshops.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This intensive program prepares learners for the AWS Solutions Architect certification by providing hands-on experience in designing and deploying cloud infrastructure. Students will gain a deep understanding of AWS services and architectural best practices.</p>\n                    <p>By the end of the course, participants will be equipped to build secure, scalable, and resilient cloud solutions and confidently pursue AWS certification.</p>\n                ', 'AWS, CloudFormation, IAM, EC2, S3, VPC, CloudWatch', NULL, '8 Weeks', '4', '\n                    <ul>\n                        <li>Gain hands-on experience with core AWS services and architecture design.</li>\n                        <li>Prepare for the AWS Solutions Architect – Associate certification exam.</li>\n                        <li>Build a portfolio of cloud infrastructure projects demonstrating real-world skills.</li>\n                        <li>Enhance career opportunities in cloud engineering, DevOps, and IT architecture roles.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(43, 'ByE59HjSV8tQ', 'Product Discovery Techniques', 'HCJPokK', '10000', '1', 'els.png', 'Reiciendis nobis eveniet sed molestias sit maiores autem. Rem sint molestiae voluptatum et commodi. Impedit velit omnis et placeat et dolorem. Rem voluptas dignissimos et nostrum a ducimus sed soluta.', 'Quam quisquam voluptas cum officia. Qui tempora animi sunt voluptas fuga quasi dicta. Aperiam esse sed occaecati consectetur voluptate et.', 'Eos voluptas nisi non aut odit sit. Numquam sunt aliquid et neque. Sit dolorum sed ipsum inventore. Repellendus voluptas voluptate et expedita aperiam nisi explicabo. Fugiat ipsa veniam soluta beatae aliquid optio.', 'A commodi sunt aut neque rem consequuntur saepe occaecati. Odio non tenetur iusto molestiae laudantium. Quia iure voluptatem ut praesentium sit velit consectetur.', 'neque', 'Cumque nihil qui reprehenderit. Nostrum deserunt itaque sed quisquam necessitatibus aut eos.', 'Quis ut repellendus optio rerum quod. Officia ut ut dolor atque. Est alias et ut praesentium consectetur error et facere.', 'velit doloremque assumenda commodi accusantium excepturi unde magnam aut nostrum', 'Ut ut eos odit amet unde pariatur.', '4 Weeks', '4', 'Et maiores quaerat autem commodi aut eius placeat et. Sunt iure alias et. Recusandae laudantium eos tempore ut. Harum debitis accusamus delectus nobis quo rerum. Labore vel qui atque voluptates.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(44, 'ByE59HjSV8tQ', 'Object-Oriented Programming in Java', 'uJj4OgP', '10000', '1', 'els.png', '\n                    <p>This course is designed for learners with a foundational understanding of programming concepts such as variables, loops, and conditionals. Prior exposure to any programming language (e.g., Python, C++, or JavaScript) will be beneficial.</p>\n                    <p>Participants should be comfortable using a code editor or IDE and have basic knowledge of how software is compiled and executed. Access to a computer with Java Development Kit (JDK) and IntelliJ IDEA or Eclipse installed is required.</p>\n                    <p>A logical mindset, attention to detail, and willingness to debug and refactor code are essential for mastering object-oriented programming principles.</p>\n                ', '\n                    <p>The curriculum is structured to provide a deep understanding of object-oriented programming using Java. Key modules include:</p>\n                    <ol>\n                        <li><strong>Introduction to Java:</strong> Java syntax, data types, control structures, and IDE setup.</li>\n                        <li><strong>Core OOP Concepts:</strong> Classes, objects, encapsulation, inheritance, polymorphism, and abstraction.</li>\n                        <li><strong>Advanced OOP Techniques:</strong> Interfaces, abstract classes, method overloading/overriding, and exception handling.</li>\n                        <li><strong>Design Patterns & Best Practices:</strong> Introduction to SOLID principles, reusable code, and clean architecture.</li>\n                        <li><strong>Testing & Debugging:</strong> Unit testing with JUnit, debugging strategies, and code refactoring.</li>\n                    </ol>\n                ', '\n                    <p>Each module is designed to reinforce theoretical concepts through practical application:</p>\n                    <ul>\n                        <li>Hands-on coding labs to implement OOP principles in real-world scenarios.</li>\n                        <li>Mini-projects such as building a library system, inventory manager, or student portal.</li>\n                        <li>Weekly quizzes and code reviews to assess understanding and improve code quality.</li>\n                        <li>Final project involving the design and development of a fully functional Java application.</li>\n                    </ul>\n                ', '\n                    <p>The course spans <strong>9 weeks</strong> and follows a structured weekly schedule:</p>\n                    <ul>\n                        <li>Two theory sessions covering core concepts and live coding demonstrations.</li>\n                        <li>One lab session focused on project development and debugging techniques.</li>\n                        <li>Final project review and presentation in week 9, with peer and instructor feedback.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This course offers a comprehensive introduction to object-oriented programming using Java. It equips learners with the skills to design modular, maintainable, and scalable software systems.</p>\n                    <p>By the end of the program, students will be able to apply OOP principles confidently, write clean and testable Java code, and understand how to structure applications using industry best practices.</p>\n                ', 'Java, IntelliJ IDEA, JUnit, Git', NULL, '9 Weeks', '4', '\n                    <ul>\n                        <li>Master object-oriented programming fundamentals and advanced Java features.</li>\n                        <li>Build a portfolio of Java applications demonstrating real-world problem-solving.</li>\n                        <li>Gain experience with professional development tools like IntelliJ IDEA and JUnit.</li>\n                        <li>Prepare for technical interviews and entry-level software engineering roles.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(45, 'ByE59HjSV8tQ', 'Computer Vision with OpenCV', 'dkom0SA', '10000', '1', 'els.png', 'Tempora saepe quasi voluptatem eius dolor debitis. Qui est occaecati illo praesentium. Facere sit sit est autem ut. Consectetur consequuntur iste facere et id unde.', 'Perspiciatis veritatis possimus incidunt minus voluptatibus. Nulla doloremque est sed qui. Quas sint ea est.', 'Excepturi itaque vero sapiente quo magni modi possimus. Veniam et reiciendis ut ad et dolor. Voluptatem minima suscipit eligendi corporis et omnis. Repellat accusantium aut qui.', 'Est velit nihil odit impedit deserunt ut. Distinctio repudiandae nulla in quia fuga qui.', 'tempore', 'Aut aut dolores et quae tenetur eos ut. Rem est ut excepturi fugit voluptates. Ut quas non unde voluptatem. Sequi vitae culpa commodi laudantium temporibus quisquam.', 'Non qui eum dolor facere nobis et. Aspernatur velit accusamus accusantium. Non necessitatibus cumque ipsam alias.', 'vero quisquam perspiciatis quos dolorem iste nihil reiciendis facilis commodi', 'Asperiores ab aut odio porro qui est ea magni.', '4 Weeks', '4', 'Blanditiis quibusdam veniam tenetur qui temporibus dolores. Ab ducimus unde deserunt ullam sapiente. Quod quia nostrum molestias est cumque ullam ea.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(46, 'ByE59HjSV8tQ', 'Full Stack Web Development', 'Hm7VKLN', '10000', '1', 'els.png', '\n                    <p>This course is designed for aspiring developers who have a foundational understanding of HTML and CSS. While prior experience with JavaScript is beneficial, it is not mandatory. A strong willingness to learn and engage in hands-on coding is essential.</p>\n                    <p>Participants should have access to a computer with internet connectivity and be comfortable navigating basic development tools. Familiarity with any programming language will accelerate progress but is not a strict requirement.</p>\n                    <p>No formal prerequisites are required, but a proactive mindset and commitment to completing weekly assignments and collaborative projects will ensure success.</p>\n                ', '\n                    <p>The curriculum is structured to provide a comprehensive understanding of full-stack web development. It includes:</p>\n                    <ol>\n                        <li><strong>Frontend Development:</strong> HTML5, CSS3, JavaScript, responsive design, and modern frameworks like React.</li>\n                        <li><strong>Backend Development:</strong> Node.js, Express.js, RESTful APIs, and server-side logic.</li>\n                        <li><strong>Database Integration:</strong> MongoDB, data modeling, and CRUD operations.</li>\n                        <li><strong>Version Control & Deployment:</strong> Git, GitHub, CI/CD pipelines, and deployment to platforms like Vercel or Heroku.</li>\n                    </ol>\n                ', '\n                    <p>Each module is designed to build practical skills through structured learning and real-world application:</p>\n                    <ul>\n                        <li>Weekly coding labs and assignments to reinforce key concepts.</li>\n                        <li>Group projects that simulate professional development environments.</li>\n                        <li>Interactive quizzes and code reviews to assess comprehension.</li>\n                        <li>Capstone project showcasing full-stack proficiency and deployment skills.</li>\n                    </ul>\n                ', '\n                    <p>Classes are held <strong>three times a week</strong>, with additional weekend project labs. Each week includes:</p>\n                    <ul>\n                        <li>Two instructor-led lectures covering theory and demonstrations.</li>\n                        <li>One hands-on coding session focused on applying concepts.</li>\n                        <li>Optional office hours and peer collaboration sessions.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This immersive program guides learners through the entire web development lifecycle. From crafting responsive user interfaces to building scalable backend services, students gain the skills needed to become proficient full-stack developers.</p>\n                    <p>By the end of the course, participants will have built and deployed multiple applications, demonstrating mastery of both frontend and backend technologies.</p>\n                ', 'HTML, CSS, JavaScript, React, Node.js, Express, MongoDB, Git', NULL, '12 Weeks', '4', '\n                    <ul>\n                        <li>Develop production-ready web applications using modern technologies.</li>\n                        <li>Build a professional portfolio with real-world projects.</li>\n                        <li>Gain confidence in collaborative coding environments and version control workflows.</li>\n                        <li>Prepare for junior developer roles or freelance opportunities.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(47, 'ByE59HjSV8tQ', 'SEO and SEM Mastery', 'Rqo2KOn', '10000', '1', 'els.png', '\n                    <p>This course is designed for marketing professionals, entrepreneurs, and business owners who have a basic understanding of websites and online content. No prior experience with SEO or advertising platforms is required, but familiarity with digital tools will be helpful.</p>\n                    <p>Participants should be comfortable using web browsers, managing basic website content (e.g., WordPress or Shopify), and interpreting simple analytics reports. Access to a laptop and internet connection is essential for campaign execution and analysis.</p>\n                    <p>A growth mindset, curiosity about digital strategy, and commitment to applying insights to real campaigns will ensure success in this program.</p>\n                ', '\n                    <p>The curriculum is structured to provide a comprehensive understanding of both organic and paid search strategies. Key modules include:</p>\n                    <ol>\n                        <li><strong>Keyword Research:</strong> Identifying high-impact keywords using tools like Google Keyword Planner and SEMrush.</li>\n                        <li><strong>On-Page SEO:</strong> Optimizing content, meta tags, internal linking, and site structure for search visibility.</li>\n                        <li><strong>Link Building:</strong> Developing ethical backlink strategies and outreach campaigns to improve domain authority.</li>\n                        <li><strong>Google Ads Setup:</strong> Creating and managing search ad campaigns, setting budgets, and targeting audiences effectively.</li>\n                        <li><strong>Performance Analytics:</strong> Using Google Analytics and SEM tools to measure ROI and refine strategy.</li>\n                    </ol>\n                ', '\n                    <p>Each module blends strategic planning with hands-on execution:</p>\n                    <ul>\n                        <li>Live campaign creation and optimization using real business scenarios.</li>\n                        <li>SEO audits and competitive analysis to identify growth opportunities.</li>\n                        <li>Ad copywriting and A/B testing to improve click-through rates and conversions.</li>\n                        <li>Weekly feedback sessions and peer reviews to refine tactics and share insights.</li>\n                    </ul>\n                ', '\n                    <p>The course runs for <strong>6 weeks</strong> with the following weekly structure:</p>\n                    <ul>\n                        <li>One strategy session focused on SEO/SEM theory and case studies.</li>\n                        <li>One campaign lab for hands-on implementation and performance tracking.</li>\n                        <li>Final audit presentation and campaign review in week 6.</li>\n                    </ul>\n                ', NULL, NULL, '\n                    <p>This intensive program equips learners with the skills to drive traffic, generate leads, and increase conversions through search engine optimization and paid advertising. From keyword strategy to campaign execution, students gain a holistic view of digital visibility.</p>\n                    <p>By the end of the course, participants will be able to launch and manage SEO/SEM campaigns, interpret performance data, and apply insights to improve marketing outcomes.</p>\n                ', 'Google Ads, SEMrush, Ahrefs, Google Analytics, Keyword Planner', NULL, '6 Weeks', '4', '\n                    <ul>\n                        <li>Launch and optimize search campaigns using industry-standard tools.</li>\n                        <li>Improve website visibility and organic rankings through proven SEO techniques.</li>\n                        <li>Measure campaign performance and ROI using analytics platforms.</li>\n                        <li>Prepare for roles in digital marketing, performance advertising, or freelance consulting.</li>\n                    </ul>\n                ', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(48, 'ByE59HjSV8tQ', 'KPI Development and Tracking', 'V6HodKJ', '10000', '1', 'els.png', 'In minima voluptatem ut excepturi. Ut sapiente ullam ea perspiciatis. Repellat sint ab voluptas et occaecati.', 'Quidem consequatur quas nemo omnis dolor a. Minus rerum aspernatur magnam aut quam quidem nemo repellat. Quia consequatur totam rem enim laboriosam illo mollitia voluptas.', 'Accusantium velit similique itaque in. At corporis dolor aspernatur amet. Non a quidem rerum. Dolores cupiditate at perferendis vel. Voluptatem non fugit quidem cum officiis modi ea.', 'Ullam ducimus eum consectetur. Repellendus harum est ex assumenda natus qui.', 'nesciunt', 'Et omnis perferendis unde corrupti rerum quae molestiae. Et cumque culpa pariatur dolorum culpa. Aut voluptas minus placeat et fuga deserunt. Autem laudantium voluptatem sequi consequatur et eum.', 'Omnis ullam eum unde deleniti est ut quia. Ut quia consequatur dicta quasi nulla eum eius facere. Quidem incidunt voluptatem impedit quasi quas accusamus nam.', 'hic esse mollitia sed sit est et magnam optio est', 'Voluptas iusto maiores hic vitae delectus molestiae.', '4 Weeks', '4', 'Odio nesciunt nemo et dolores sit voluptatem. Quis sit est enim voluptatem vel eos aut. Rem quia cumque sed placeat maxime consectetur eum. Repellendus sint omnis fugiat ea neque exercitationem omnis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(49, 'ByE59HjSV8tQ', 'Marketing Analytics with GA4', 'Rqo2KOn', '10000', '1', 'els.png', 'Quas vel delectus quae dolorum neque ad. Omnis sunt totam enim delectus necessitatibus impedit pariatur possimus. Fugiat architecto fugit dolor excepturi modi fugit delectus. Eius quia asperiores harum et asperiores et.', 'Harum facere ut rerum tempora molestias facilis eius porro. Voluptatem quia consequatur eos numquam. Quis expedita saepe vitae. Earum ut quo nemo facilis facere laboriosam quas.', 'Ab eum voluptas iste. Aliquam unde quasi sunt soluta velit quos. Fuga excepturi provident et voluptate. Libero nam a et minima totam.', 'Veritatis quas et et assumenda magnam qui praesentium. Quos molestias sapiente aliquid laudantium molestiae quae omnis. Velit velit suscipit rem vel. Minus ipsum veritatis provident ratione molestiae atque cumque.', 'suscipit', 'Fugiat facere quia provident impedit hic. Debitis eaque quis qui. Placeat nisi voluptatem harum quia et. Minima consequatur soluta veritatis occaecati reiciendis dolore.', 'Quisquam non accusantium eaque consequatur qui laboriosam. Distinctio velit molestiae optio voluptas. Suscipit voluptate porro labore amet est similique. Qui voluptas aut totam voluptas. Consectetur autem soluta in deserunt dicta.', 'dolores perferendis non veniam alias fuga similique at sit quam', 'Maiores voluptas dolores a et.', '4 Weeks', '4', 'Blanditiis optio animi nemo aut. Dicta est nulla nesciunt consectetur. Veritatis itaque praesentium occaecati enim dolore. Voluptas officiis est itaque amet provident tempore ex quos.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(50, 'ByE59HjSV8tQ', 'SQL for Data Exploration', 'bC5MrFD', '10000', '1', 'els.png', 'Quo sint quo tempora eaque cum. Et non non modi et. Optio sunt ut saepe et blanditiis.', 'Et ipsam omnis quibusdam laboriosam. Facilis vel quo dignissimos et ea. Tempore enim vero nihil quidem. Non deleniti ut sapiente neque sint et laboriosam. Voluptas ratione voluptates ducimus dolorem omnis.', 'Molestiae voluptatem commodi consequatur pariatur. Eius nostrum sequi sequi iste sit libero quo.', 'Rem architecto labore voluptas qui harum quod aspernatur. Quas corrupti laudantium quibusdam dolorum et et autem dignissimos. Ut voluptas non mollitia tempora error eum.', 'ea', 'Architecto repudiandae sapiente dolorum quo iure tempora. Rerum omnis magnam ab quia. Et illum minus qui quae dolor.', 'Dolor voluptatum sunt sed sit. Quo tempore in ipsam quis nam dolores. Quis voluptatum perferendis odio et.', 'accusantium ut possimus recusandae voluptate commodi molestiae et sed earum', 'Consectetur quia quae qui explicabo eos perferendis rerum.', '4 Weeks', '4', 'Voluptatem asperiores repellat ea similique quo. Eos voluptas tempora eaque adipisci voluptatem. Provident officia sit neque voluptas. Recusandae officia autem voluptatibus est minus quia.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(51, 'ByE59HjSV8tQ', 'Multi-Cloud Deployment Strategies', 'i3duKSm', '10000', '1', 'els.png', 'Magni qui animi atque. Perspiciatis omnis aspernatur tenetur aut eligendi adipisci quia. Fuga et consequatur perferendis totam aperiam totam.', 'Aut et officiis quaerat voluptatem quod fugit asperiores explicabo. Illum necessitatibus sunt eligendi quam. Pariatur ratione in eum et et tempore amet.', 'Animi impedit veniam excepturi est deleniti sint voluptate numquam. Minus numquam reprehenderit laborum enim. Enim ea voluptatem impedit dolore praesentium aliquam. Consequatur eveniet voluptas et quos.', 'Et quo et velit cumque rerum. Autem quaerat nobis repudiandae laudantium dolorem perspiciatis atque. Voluptatem nulla ullam nihil et maiores. Quas rerum eius non esse possimus.', 'amet', 'Et deserunt voluptatibus sed aut dignissimos iste praesentium voluptatum. Accusamus eum nesciunt dolorum quibusdam consequatur et sed. Sed voluptas ut mollitia nemo sit ipsa.', 'Non libero placeat aperiam. Architecto debitis quibusdam eius eius. Error ratione quis sequi aliquam et.', 'facere laboriosam rerum natus eum est tempore dignissimos voluptas quam', 'Dicta ipsam fugiat eius expedita.', '4 Weeks', '4', 'Esse qui expedita consequuntur. Dignissimos vel laborum omnis et. Provident harum voluptatem sed esse quaerat. Reiciendis aut quia tempora laborum doloremque eum qui.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(52, 'ByE59HjSV8tQ', 'RPA Strategy and Implementation', 'exD4HQP', '10000', '1', 'els.png', 'Hic sed cumque sed at soluta reprehenderit est. Voluptate consequatur magni adipisci labore ab. Culpa similique iste qui et vel. Ut et voluptatibus ut fuga. Nemo est illo dolorem rerum recusandae et aut.', 'Voluptas nulla placeat quaerat provident quia at ipsa. Expedita perspiciatis voluptatibus et unde iure sunt. Non quos hic eos et maiores.', 'Aliquam ea natus autem non iure. Cumque quia tempore dolore voluptas. Recusandae iure voluptatem voluptas architecto.', 'Tempore dolor aut quas id. Nesciunt sed non praesentium a occaecati. Delectus consequuntur at facilis eos. Et id nihil aut quaerat delectus esse molestiae.', 'deleniti', 'Consectetur ea animi odio porro. Recusandae sed qui eveniet omnis. Et expedita quis occaecati dolore nam earum voluptatem.', 'Eos sed veritatis neque quaerat. Voluptate et dolorum voluptate dolor unde corporis. Qui iure corporis numquam in cum asperiores.', 'velit maiores ipsa excepturi sit recusandae architecto assumenda nobis repudiandae', 'Est odio cupiditate molestiae repellat molestiae cum commodi fuga.', '4 Weeks', '4', 'Consequatur et velit beatae omnis. Ipsa pariatur quos quos. Aut voluptatem dolor fuga similique sit.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(53, 'ByE59HjSV8tQ', 'Intelligent Document Processing', 'exD4HQP', '10000', '1', 'els.png', 'Fuga vitae consequatur ea. Sed totam recusandae aut suscipit perspiciatis nobis laudantium. Qui impedit et at quia id vitae. Quam non culpa eum quo a ipsum nihil.', 'Dolorem officia sed laborum. Nam voluptatem voluptatem reiciendis voluptas non praesentium dolore recusandae. Consequatur rerum enim deleniti sint beatae qui.', 'Ab omnis nemo numquam voluptas corrupti. A non incidunt optio labore. Provident totam molestiae et consectetur occaecati quo qui. Voluptatum iure recusandae impedit illo consectetur minus delectus. Aut vero aut ipsum suscipit assumenda quaerat impedit eius.', 'Et quam qui voluptate veniam quisquam aperiam. Repellat distinctio pariatur voluptas optio. Et accusamus et voluptatum quam. Eveniet alias quos placeat aut laboriosam.', 'a', 'Blanditiis non in incidunt ipsam quidem non omnis corporis. Dolorum dolorem necessitatibus et ut quisquam.', 'Et voluptas mollitia nulla laudantium. Odio aut voluptas rem et fugit qui. Natus eos ut doloribus fugiat odit facilis deleniti.', 'id architecto vel temporibus aut commodi nihil eum assumenda natus', 'Reiciendis minus dignissimos corrupti possimus est.', '4 Weeks', '4', 'Ea deserunt velit illum perferendis quas fugiat minus. Cumque tempore suscipit doloremque recusandae omnis est. Dicta exercitationem aperiam incidunt quidem. Laborum aut quaerat ut facilis asperiores a.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(54, 'ByE59HjSV8tQ', 'Social Media Marketing', 'Rqo2KOn', '10000', '1', 'els.png', 'Eum non dolore non. Enim impedit nulla modi illum doloribus autem. Et quibusdam consequuntur distinctio eum.', 'A tempore fuga ad sint consequatur. Quasi enim saepe dolor placeat. Laboriosam nam a aut consequatur quidem et voluptatibus.', 'Vel ut repudiandae dolore dignissimos ex alias voluptates. Molestiae magni ratione quos qui soluta. Voluptate porro necessitatibus consequatur ut quia.', 'Dolore officiis aperiam vitae iusto. Ullam corporis et repudiandae omnis dolores consequatur illum qui. Quod ipsam deserunt quia beatae. Perferendis aliquam repellendus esse et in consequatur.', 'nihil', 'Accusantium dicta quidem est deleniti dolor eos aut. Quia assumenda non necessitatibus rerum velit. Reprehenderit accusamus doloribus veritatis magnam sunt minus. Fuga maxime voluptas nulla doloribus omnis dolor numquam earum.', 'Exercitationem quam corrupti earum rerum doloremque molestias soluta in. Maiores ut maxime quisquam sapiente rerum. Eos doloribus quia delectus perferendis et fugiat.', 'voluptatem eligendi velit deserunt dolorem repellat quam laborum quia est', 'Et est reprehenderit debitis ipsam debitis totam doloremque.', '4 Weeks', '4', 'Vitae laboriosam dolorum ipsam consequatur iste itaque dolores. Accusamus eaque cumque totam odit. Sint est est explicabo vel dicta nesciunt sit.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL);
INSERT INTO `courses` (`course_id`, `slug`, `course_name`, `programSlug`, `course_price`, `user_id`, `banner`, `basic_requirements`, `course_outline`, `learning_module`, `course_schedule`, `training_type`, `payment_structure`, `course_overview`, `course_technologies`, `packages_included`, `duration`, `ratings`, `benefits`, `course_discount`, `course_introduction`, `updated_at`, `created_at`, `deleted_at`) VALUES
(55, 'ByE59HjSV8tQ', 'Relational Database Fundamentals', 'GMr7Ziu', '10000', '1', 'els.png', 'Consequuntur molestias omnis at ullam voluptas magni natus nobis. Molestias et est adipisci reprehenderit ipsam laudantium maxime. Est pariatur minus vel omnis non aliquam. Non expedita exercitationem quos dolorem hic quaerat omnis.', 'Repellendus maxime tenetur vero quia ab. Aut voluptate ut tenetur delectus accusamus. Fugiat veritatis aliquid aut quos.', 'Veritatis molestias deleniti qui possimus ratione et natus eos. Asperiores nihil molestiae dolor odio commodi. Ipsum aliquam reprehenderit ipsa quasi.', 'Eos quis est reiciendis quia. Corporis laboriosam nesciunt ducimus minima nostrum consectetur aspernatur. Quas doloribus sed ut eos debitis exercitationem.', 'et', 'Vero impedit dolor minus. Dolor consectetur blanditiis nihil non libero. Ad quia quam omnis.', 'Suscipit fugit facere iure sit cum laudantium voluptatem et. Voluptate quo aspernatur nam distinctio minus est.', 'autem qui molestiae quis quos qui magnam ratione quas a', 'Qui debitis possimus est consectetur cumque nulla eum.', '4 Weeks', '4', 'Odio minima exercitationem ut id ab quas quam. Fuga nostrum qui et natus quia. Sit numquam similique quasi consequatur. Similique numquam quae eaque repudiandae.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(56, 'ByE59HjSV8tQ', 'Serverless Architecture with AWS Lambda', 'i3duKSm', '10000', '1', 'els.png', 'Placeat beatae in rerum. Non quidem est est labore. Rerum et corrupti eligendi autem dignissimos culpa. Qui natus id earum qui est minus id. Fugit ut iure sed sequi officiis odit.', 'Est voluptas laborum dolores cupiditate et assumenda veritatis. Officiis eaque fugiat id. Dolores accusamus ea harum aliquam veritatis. Et consequatur quae atque occaecati sed.', 'Eos adipisci et asperiores qui ex. Est sit facere doloribus voluptas a.', 'Hic minima nulla tenetur ut. Officiis et eum ipsam ut nihil. Voluptas accusantium magni eos vitae aliquid ab. Quisquam iure eos voluptas illo veniam quam et.', 'doloremque', 'Voluptates reiciendis in alias est ut et molestiae. Ut fugiat molestias quis harum unde eum aut. Dignissimos vel qui est autem et optio totam officiis. Nobis temporibus perspiciatis officiis vel iure.', 'Aliquam cupiditate porro molestiae. Unde placeat ad veniam rem. Nihil libero velit aliquam aliquid. Suscipit suscipit consectetur et a optio.', 'ipsa omnis non distinctio deserunt reprehenderit tenetur et aperiam asperiores', 'Distinctio necessitatibus quae repellendus ipsum quos cum et quisquam.', '4 Weeks', '4', 'Quidem quia accusamus atque aspernatur velit quos. Et voluptas consequatur aut quisquam rem. Laborum est sed placeat velit et. Exercitationem placeat ducimus enim facilis quia nulla.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(57, 'ByE59HjSV8tQ', 'Design Thinking Workshop', 'pXftY6G', '10000', '1', 'els.png', 'Rerum magnam animi atque aliquam accusamus. Dolorem aut est praesentium est in. Accusamus officia nostrum pariatur dignissimos ratione quae. Nostrum et autem minima saepe. Sit possimus porro eum voluptas ullam qui.', 'Pariatur tempore nemo vel molestiae. Laborum sunt voluptas voluptas est non ullam consectetur. Laborum velit nam sit at sint earum. Perspiciatis asperiores aspernatur at saepe alias quis non.', 'Et voluptatem id iusto officiis id. Sed perferendis officiis aspernatur alias distinctio aut aut similique. Voluptates repellat quasi ea quia. Sequi enim sequi iste quos velit totam numquam.', 'Adipisci laudantium eveniet ut eveniet error rerum. Ex autem iste accusantium magnam quo illo. Qui quas excepturi qui voluptatum quaerat.', 'sed', 'Provident voluptatem accusantium doloribus in. In qui unde perferendis consequatur. Illo enim aperiam asperiores minus. Porro similique incidunt saepe temporibus aut eveniet animi.', 'Laudantium veritatis sint qui qui voluptas omnis reprehenderit maxime. Quae quibusdam vel aut aliquam expedita placeat dolor veniam.', 'vel et et aut maxime modi accusamus sed et doloribus', 'Consequatur alias ducimus modi neque.', '4 Weeks', '4', 'Possimus earum dolores incidunt soluta laudantium. Et vero reprehenderit et eum aut veniam voluptate. Odit voluptatem perspiciatis quas.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(58, 'ByE59HjSV8tQ', 'Continuous Integration Strategies', 'uJj4OgP', '10000', '1', 'els.png', 'Et nihil atque assumenda doloribus provident aut necessitatibus. Est repellendus aliquid eum voluptates ipsa ut. Officia eos velit sint et quaerat in omnis.', 'A officiis eligendi et inventore. Possimus consequatur quidem exercitationem quasi non accusantium minus cum. Ullam labore ut qui laudantium.', 'Ea corrupti hic exercitationem enim nulla et. Non quaerat quisquam asperiores aut asperiores deserunt. Molestias pariatur excepturi impedit deserunt quidem libero harum officia. Autem est sint vel pariatur. Corporis sunt enim voluptatem quas quia.', 'Asperiores eos quam voluptatem esse libero et reiciendis soluta. A ullam error quae porro minima.', 'tempora', 'Sit ipsam reprehenderit soluta quia nulla voluptas dolores. Corporis quo consectetur veritatis dolorum vero harum.', 'Impedit aspernatur repellat voluptatem voluptates. Enim corporis reprehenderit similique. Quia et in placeat corrupti.', 'culpa exercitationem minima sed repudiandae inventore dolores unde quod fuga', 'Quis eveniet dolores deserunt.', '4 Weeks', '4', 'Eum omnis occaecati autem sed quasi recusandae. Recusandae libero et quidem voluptas.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(59, 'ByE59HjSV8tQ', 'RPA with Python Scripting', 'exD4HQP', '10000', '1', 'els.png', 'Vero vitae enim ut deserunt. Omnis sequi quo ut aut aut ipsam. Voluptas architecto veritatis repellat doloremque at libero qui recusandae.', 'Non dolorem et deleniti ipsam nobis qui. Impedit et sit porro enim ea. Vitae nostrum quod sint magni ipsum.', 'Quas enim aut est et molestiae doloremque. Et est omnis dolores asperiores. Aut officia rerum expedita ratione.', 'Aut est neque ullam numquam sunt enim. Atque hic autem quae eligendi. Ut error accusamus sint aliquam quisquam enim exercitationem. Dolor perferendis in error iste iusto est voluptatem. Et non sed nemo enim beatae similique neque sit.', 'dolor', 'Vitae minima quae possimus qui animi atque. Fugiat consequatur aut et rerum. Beatae veritatis facere dolor sunt.', 'Asperiores atque et magnam odio. Amet eveniet omnis similique pariatur quia. Tempora modi ipsam ullam est doloremque.', 'dolor est et culpa adipisci fugit laborum culpa aliquam optio', 'Tempore eius facere ipsum qui voluptatem distinctio.', '4 Weeks', '4', 'Quam omnis quia nisi vel tempore. Ut nihil laudantium non dignissimos vel laboriosam. Culpa architecto architecto nihil repellendus unde. A quam ut reiciendis explicabo voluptatem neque.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(60, 'ByE59HjSV8tQ', 'Laravel for Beginners', 'Hm7VKLN', '10000', '1', 'els.png', 'Molestiae sapiente tempora voluptas assumenda atque. Quis beatae fuga molestiae eaque aut quisquam occaecati. Accusamus doloremque ducimus aut beatae incidunt.', 'Vero nihil voluptatibus doloribus. Doloribus eaque qui et earum officiis repellendus. Aut et beatae quae aspernatur totam dicta vel.', 'Voluptatibus ipsum voluptas deleniti voluptas quisquam. Ipsa provident architecto asperiores voluptatibus modi voluptatem.', 'Nostrum officiis distinctio enim sapiente. Nihil velit dolores unde. Autem at voluptatem ea sit praesentium.', 'ratione', 'Ut eos nisi distinctio. Explicabo temporibus aliquid odio ut. Quod quos quibusdam est quibusdam. Ut numquam soluta commodi et est illum.', 'Est ipsum numquam dolor omnis ducimus dolorem voluptas. Neque voluptas eligendi distinctio qui dolor ab harum. Animi aut maxime sunt suscipit est nesciunt aut.', 'quasi nam qui sed at culpa necessitatibus ut sed magnam', 'Qui amet rem magni nihil sint maiores.', '4 Weeks', '4', 'Eum aut eos esse eos molestiae dolorem odio id. Sed sit atque eveniet quos. Sequi doloribus nostrum non. Qui saepe ea repellat quis saepe ad a.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(61, 'ByE59HjSV8tQ', 'Incident Response and Forensics', 'wElWYnx', '10000', '1', 'els.png', 'Et maxime cumque molestiae quia quasi dolor. Cum blanditiis aperiam laborum et sunt. Ut distinctio molestiae cupiditate vitae. Et ullam ducimus aut ducimus omnis.', 'Consequatur et cum et rerum facilis sapiente vel. Et veniam enim necessitatibus. Aut qui natus quibusdam culpa aspernatur quo ut. Aut quae voluptatem id nam sit totam nihil autem.', 'Voluptatibus autem id a architecto quo rerum veniam consequuntur. Tenetur facere quaerat consequatur qui molestiae labore ad. Dicta fuga cum dolorum iusto ratione vero error. Molestiae ut ut mollitia.', 'Minus et quia illo qui. Non et dolorem asperiores in. Odit ipsa ab porro magnam totam officia culpa.', 'perferendis', 'Eaque quas impedit consequuntur velit aut repudiandae nesciunt. Consequuntur et placeat culpa consequatur temporibus. Consequatur deleniti sed sit accusantium facere. Qui aperiam impedit incidunt aspernatur porro.', 'Sit est vel et dolorem blanditiis reprehenderit deserunt eveniet. Sunt saepe quas a nostrum ut. Corrupti quo fugit alias beatae molestias ut fugit.', 'deleniti exercitationem iste error illo tenetur vel voluptatem id laborum', 'Quis ex vel dolor atque quis fuga illum.', '4 Weeks', '4', 'Incidunt assumenda id quod quos ipsam quisquam. Molestiae voluptas corporis aut officia dolorem repudiandae qui. In similique magnam molestiae molestias debitis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(62, 'ByE59HjSV8tQ', 'RPA Governance and Compliance', 'exD4HQP', '10000', '1', 'els.png', 'Optio doloribus veniam fuga odio. Ut et nobis tenetur est dignissimos sed.', 'Eos molestiae et saepe ut expedita corporis. Quod quibusdam velit et nam explicabo. Qui qui omnis est iste eligendi veniam. Odio at reprehenderit aliquid occaecati.', 'Et eos excepturi omnis libero dolorum. Commodi explicabo dolorem voluptates consequatur.', 'Excepturi dignissimos saepe assumenda optio animi vel aut. Eum temporibus reprehenderit fuga quibusdam. Quae reiciendis quia aut ut ut quis aut.', 'enim', 'Natus quis ut qui. Perspiciatis est quasi corporis iusto. Nisi nesciunt id sapiente.', 'Repudiandae perspiciatis est quisquam exercitationem eius deserunt quia. Ducimus perferendis voluptatum dignissimos tempora sunt aliquam expedita. Similique est voluptas maiores non.', 'at ipsam dolores commodi eos reprehenderit nobis non velit omnis', 'Provident reprehenderit nobis perspiciatis.', '4 Weeks', '4', 'Autem inventore soluta nemo rerum. Eligendi sed nemo quis est. Et consequatur modi ea harum ut ipsa.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(63, 'ByE59HjSV8tQ', 'NoSQL with MongoDB', 'GMr7Ziu', '10000', '1', 'els.png', 'Neque sed excepturi nobis rerum qui fugiat. Voluptatibus fuga est inventore neque qui nostrum numquam. Quasi deleniti ea qui perspiciatis sit. Accusamus laboriosam dolor consequatur quasi voluptatem dolores. Maiores ad facilis asperiores sit voluptas.', 'Est nostrum et ipsam at assumenda in. Quis aliquid et ullam quia molestiae optio beatae aperiam. Saepe saepe repellendus asperiores quia. Porro ipsum ea quod doloremque ut.', 'Ipsam eum quis itaque amet neque. Aspernatur nesciunt est et. Inventore quis nulla dolores ea cum.', 'Quis reiciendis tempora similique est sed eos nemo. Impedit rerum reprehenderit qui aut. Asperiores deleniti expedita saepe. Reprehenderit ut vel accusamus velit excepturi nemo id est. Quo animi rem voluptates tempora occaecati tenetur.', 'aut', 'Minus distinctio sunt nostrum repellat deleniti necessitatibus a a. Assumenda numquam dolorem aliquam iste iure. Enim quae accusantium sed ut quisquam. Possimus illum nostrum mollitia consectetur illum unde quod.', 'Perspiciatis velit quam quaerat quaerat modi. Quia atque dolorem odio quis. Molestias ipsum consequatur ut et.', 'incidunt consequatur distinctio molestiae et rerum corrupti excepturi saepe fugit', 'Et est aut iusto sint sint qui.', '4 Weeks', '4', 'Consequatur qui quis non odit a repudiandae. Ratione vel et voluptatem id sapiente. Esse neque autem error laboriosam dolorum sed.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(64, 'ByE59HjSV8tQ', 'Building APIs with Node.js', 'Hm7VKLN', '10000', '1', 'els.png', 'Voluptatem mollitia rerum earum. Eveniet aut qui corporis consectetur accusantium. Omnis rerum ut iste nulla. Aliquam assumenda autem blanditiis enim. Nobis corporis iure incidunt vel in et.', 'Quos temporibus laborum eum perspiciatis eaque. Quia magnam placeat ullam culpa eos vel commodi. Optio voluptate culpa quia suscipit voluptates perspiciatis est. Omnis fugiat aut quas sit.', 'Minima facere facere voluptatibus ipsum voluptatem eos. Repellat aut nisi ut minus dolore voluptas eos. Neque dignissimos dolorem vel voluptatem aliquam quia exercitationem aliquam. Excepturi harum occaecati dicta iure officia tenetur minus.', 'Ipsum et beatae quia. In neque nesciunt perspiciatis enim.', 'animi', 'Et quis sit in aut similique eligendi. Qui cumque repellendus rem occaecati id. Natus quibusdam ut nobis quas vel officia. Incidunt alias quia tempora suscipit nisi explicabo.', 'Quod iste qui deserunt nihil. Mollitia quae quidem iste et nobis vero dicta. Dolorum voluptatem neque eum itaque. Nostrum enim saepe quo eos quas pariatur expedita.', 'saepe ut qui sint sapiente quisquam mollitia voluptatibus dolores quidem', 'Officia quod magni dolores.', '4 Weeks', '4', 'Dolores labore eligendi temporibus explicabo. Voluptas quasi id magnam commodi molestias repellat vero. Blanditiis error est molestias velit ut ut. Saepe porro voluptatem dolorum consequatur sunt non voluptatem vel.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(65, 'ByE59HjSV8tQ', 'Email Campaign Optimization', 'Rqo2KOn', '10000', '1', 'els.png', 'Neque et alias eum. Rerum impedit nulla non sit natus nobis. Aliquid autem reiciendis debitis quaerat. Voluptate delectus deleniti sed.', 'Porro soluta culpa sapiente placeat quisquam porro. Eos ut maiores velit consequuntur labore officia. Ad quia voluptatem ea earum recusandae sit voluptates.', 'Aut explicabo possimus ipsum voluptatem alias autem. Aliquid rem consectetur ratione incidunt voluptatem qui et. Dolorem consequatur suscipit temporibus quaerat. Asperiores tempore laborum velit ab quaerat.', 'Ut corrupti error aut nam voluptatem suscipit. Est provident ipsa corporis. Aliquid ut nesciunt nemo perferendis laudantium qui. Consequatur est provident praesentium sunt eum optio molestiae.', 'voluptatem', 'Mollitia et excepturi nesciunt aperiam officia. Est voluptas voluptatem ipsa qui cupiditate sint temporibus. Temporibus laboriosam at impedit et molestiae dicta esse. Excepturi ut tempore dolor.', 'Nobis qui ut necessitatibus. Rem natus est itaque quae autem quia nobis placeat. Quo non eaque ut vel cumque minus nisi quidem.', 'cupiditate et architecto quis expedita voluptatem dolorem quos dolor modi', 'Impedit sint similique quam delectus cupiditate.', '4 Weeks', '4', 'Asperiores fugiat cupiditate qui aspernatur. In a quo doloribus est illo placeat. Dolores nam iure et.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(66, 'ByE59HjSV8tQ', 'Stakeholder Communication Skills', 'HCJPokK', '10000', '1', 'els.png', 'Numquam fuga ut quisquam dolores rem. Aliquid iure in modi possimus maiores.', 'Ut ut perspiciatis rem natus. Dignissimos ea dolor excepturi. Nesciunt autem nulla dicta.', 'Id laudantium vel ut ipsam sint consequatur. Totam rerum aut quo error id. Nemo quo doloremque et molestiae qui quia. Repudiandae dolor est rem molestiae et at.', 'Aliquam qui qui recusandae aut autem quia itaque. Accusantium aliquam possimus delectus et enim non placeat. Et fuga omnis sit saepe.', 'aliquam', 'Et quo cum sit accusamus sapiente reiciendis reprehenderit. Perspiciatis quaerat ipsum nisi. Est sed omnis omnis laudantium natus voluptas inventore. Quibusdam dolores sapiente qui incidunt qui eos. Est eos voluptas maiores ratione molestiae omnis.', 'Vero omnis quia suscipit. Quisquam libero numquam officiis asperiores quis sit. Quisquam ut sed atque hic nisi illo.', 'esse quidem et qui ullam et dolorem rerum mollitia ut', 'Asperiores culpa numquam esse earum aliquid.', '4 Weeks', '4', 'Et qui in voluptatem dignissimos. Quia molestias dicta alias ipsam. Perspiciatis ullam autem aperiam optio rerum. Explicabo quibusdam quasi minus voluptas reprehenderit eligendi.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(67, 'ByE59HjSV8tQ', 'Incident Response and Forensics', 'wElWYnx', '10000', '1', 'els.png', 'Quisquam qui facilis et tenetur esse fuga. Quo qui ut sint ut voluptatem. Aut doloremque id error quibusdam eaque quia unde.', 'Sint omnis laborum qui ut quam cumque. A officiis quae excepturi nobis architecto dolorem. Tempora soluta at quia animi similique.', 'Sit reprehenderit maxime fugiat accusantium eum nemo. Cum architecto consequatur harum quam. Sequi explicabo ab at enim quisquam voluptatem maiores commodi. Et dicta fuga quasi et rerum tempore qui iusto.', 'Consequatur exercitationem et rerum doloribus ut ullam animi tempora. Autem velit quos consectetur. Ex explicabo eveniet quibusdam placeat autem distinctio.', 'perspiciatis', 'In illo repellat et eius est cupiditate neque. Facilis aut dicta nisi laudantium enim ab reiciendis vitae. Pariatur repudiandae earum et tempore veniam nam eum. Necessitatibus hic est non repudiandae facilis.', 'Est est facilis rerum placeat est ad ex. Itaque quam in et eum magnam. Dolores quaerat voluptate est quaerat. Enim eos sint voluptatem quis ducimus consectetur et animi.', 'facere similique ut id enim aut ut veniam atque ut', 'Quidem ipsam sunt deleniti perferendis inventore.', '4 Weeks', '4', 'Impedit iusto occaecati excepturi suscipit nisi. Tempore repudiandae voluptatem qui et. Consequatur culpa quia totam.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(68, 'ByE59HjSV8tQ', 'Building APIs with Node.js', 'Hm7VKLN', '10000', '1', 'els.png', 'Perferendis et quaerat ut earum deserunt illum. Est quia atque ut odio non dolorem. Consectetur hic quas sunt similique voluptate dolores. Beatae tempore amet error impedit ducimus molestiae.', 'Aut aliquid commodi rerum omnis aut et. Eaque dolorem occaecati qui ad et assumenda totam. Unde repellat sed fuga omnis ea doloremque quibusdam est. Quidem voluptatibus iusto cum dignissimos dolorum saepe hic.', 'Laborum quos exercitationem exercitationem possimus occaecati. Quibusdam suscipit necessitatibus est est aliquid voluptates. Omnis at unde id ullam laudantium ducimus praesentium. Sed iste magni in doloribus quas quibusdam.', 'Qui quae quas quasi veniam qui corrupti ut. Iusto quia accusamus voluptatum earum reiciendis. Vel aspernatur necessitatibus laboriosam natus est labore. Veniam laboriosam est pariatur. Nihil sapiente sed et.', 'ut', 'Dolor dolore sed nulla asperiores alias. Recusandae animi modi et sed velit nobis. Non qui a quibusdam nihil dolorum. Totam doloribus voluptatem velit quam ratione.', 'Eius vitae debitis delectus temporibus omnis. Ut voluptas rerum harum quia qui repellendus natus. Aut omnis accusantium voluptatem voluptas voluptatum sed.', 'voluptas quibusdam dolore eaque est quis saepe repellendus modi laborum', 'Quia deleniti hic deleniti repellat omnis nihil sit.', '4 Weeks', '4', 'Est ipsum adipisci velit quod aut ut. Eligendi asperiores esse eos nisi aut doloremque.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(69, 'ByE59HjSV8tQ', 'SQL for Data Exploration', 'bC5MrFD', '10000', '1', 'els.png', 'Beatae nobis velit rerum perferendis. Veniam aliquid quam libero et mollitia reprehenderit eum. Porro labore blanditiis optio eveniet nobis. Non consequuntur omnis ducimus fuga sed excepturi.', 'Vel nesciunt aliquid recusandae est corrupti delectus. Magnam temporibus voluptatibus ea eveniet iusto ea est. Enim deleniti aut eos officiis. In nihil consequatur sint laboriosam rerum quasi.', 'Ut qui mollitia odit excepturi. Ut harum repellendus voluptate est. Distinctio facere nihil sint aperiam voluptas natus aut.', 'Odit veritatis occaecati sit in quia. Eum quia praesentium vero mollitia. Alias consequatur libero tenetur quidem voluptas.', 'expedita', 'Sunt praesentium ea fugit fuga ipsam quo inventore. Quo aut earum modi rerum. Sed velit quod nemo dignissimos sapiente est sequi.', 'Consequuntur et dolorem non est. Nobis rerum soluta tempora qui. Est consequuntur et est doloribus voluptas rerum.', 'occaecati inventore expedita aut quasi autem quos qui quis corporis', 'Officiis veritatis qui voluptate iste impedit consequatur minima.', '4 Weeks', '4', 'Eum distinctio quis id. Officiis alias eius animi hic. Et voluptatem consectetur qui placeat beatae. Cum sit quam et quaerat sed reiciendis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(70, 'ByE59HjSV8tQ', 'Network Security Basics', 'wElWYnx', '10000', '1', 'els.png', 'Suscipit qui et quia esse quis. Eum nobis maxime deserunt vitae facilis magni. Ratione voluptate fuga omnis et dignissimos id ut.', 'Fugit rerum ut vero assumenda. Quia eius dolorem et tempora cum explicabo excepturi. Mollitia delectus incidunt voluptatum quia minus nemo incidunt. Asperiores ea deserunt incidunt vel pariatur sed est.', 'Rerum ex molestiae aspernatur occaecati. Dolore incidunt est laboriosam fuga architecto et consectetur. At distinctio adipisci voluptatem dicta ut accusantium ducimus perferendis.', 'Iusto consectetur ea porro et voluptatem provident mollitia. Itaque adipisci dicta consequatur incidunt qui earum beatae. Tenetur ea unde voluptatem mollitia.', 'a', 'Quisquam provident molestiae odio cupiditate reprehenderit. Magnam laudantium qui excepturi. Voluptatem sed cumque ad quas. Magni debitis iste est ut.', 'Minima impedit est sit natus soluta occaecati dignissimos quos. Magni inventore corporis dignissimos vitae. Sit odio vitae id vitae a autem accusamus.', 'fugit aut excepturi alias qui beatae repellendus ut recusandae assumenda', 'Nam maiores error perferendis distinctio voluptatem esse sed.', '4 Weeks', '4', 'Nihil quos ut esse alias earum quas. Saepe distinctio ad omnis qui. Sit dolorem et blanditiis reiciendis dignissimos illum. Sit rerum consequatur ullam id.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(71, 'ByE59HjSV8tQ', 'Visual Storytelling for Designers', 'pXftY6G', '10000', '1', 'els.png', 'Ea modi nulla dolores velit porro et pariatur et. Qui omnis quaerat magnam quia error. Accusantium qui nihil suscipit et.', 'Nobis ipsa doloribus enim dolore iure. Voluptatem minima et alias libero numquam ea. Quas dolorem ratione ducimus. Recusandae corporis delectus natus esse beatae quia quia aut. Eum animi similique dolorum laborum.', 'Rem velit eaque odio vitae et vero. Illum ducimus occaecati ea inventore consectetur voluptate. Sint necessitatibus est quis placeat.', 'Officiis vel porro natus a. Suscipit numquam ea iure fuga natus qui. Illo ut dolore qui modi totam. Dolorum sint ea et quis. Eum veniam libero ut sit.', 'ea', 'Ipsa dolorum et ut voluptas dolor possimus facilis. Animi esse voluptatem velit suscipit. Laboriosam exercitationem qui quia ab voluptatem in.', 'Inventore minima perspiciatis aperiam porro. Soluta voluptas ea aliquam ut.', 'quam totam hic quisquam illo repellat dicta officiis voluptatem autem', 'Fugiat id nemo corrupti qui quisquam.', '4 Weeks', '4', 'Deleniti aliquid laboriosam rerum aut sapiente ut repellendus in. Accusamus ut assumenda repellat quod necessitatibus molestiae perferendis. Et deleniti laboriosam facilis veritatis corporis sint omnis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(72, 'ByE59HjSV8tQ', 'User Research and MVP Strategy', 'HCJPokK', '10000', '1', 'els.png', 'Quas harum quidem debitis. Sed eum quia ut et quasi nam. Autem atque rerum autem a aut veniam.', 'Fuga rerum autem possimus temporibus. Quia ducimus aut consectetur aspernatur voluptate dicta.', 'A dolorum sit qui ut et numquam vitae nam. Neque eveniet consequuntur veniam eveniet dignissimos consequatur porro hic. Et et eum similique dolor culpa.', 'Inventore sit perspiciatis fuga facilis expedita quis occaecati qui. Nobis earum expedita quia omnis quasi non sunt. Odio ut sit ratione culpa porro laudantium.', 'sed', 'Dolor culpa et similique sapiente cumque fuga quia. Ea voluptatum voluptas iure nostrum accusantium molestias officia consectetur.', 'Consequuntur distinctio harum iure itaque quo porro. Facere ut iste dolores in quo quod aut. Delectus quasi et ratione sed qui aut est.', 'nisi voluptas consequatur iusto adipisci suscipit ratione maxime perspiciatis qui', 'Consequatur provident unde molestiae qui.', '4 Weeks', '4', 'Eum et sit illum velit. In tempora neque officiis pariatur. Autem temporibus tempora vel et veniam vel. Aperiam qui quaerat laboriosam sint.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(73, 'ByE59HjSV8tQ', 'Power BI Dashboard Design', 'V6HodKJ', '10000', '1', 'els.png', 'Nihil iure aperiam ut sed. Quas voluptatem quia sint asperiores ducimus in vel.', 'Dolorum sit cum quam harum sequi temporibus. Architecto autem maiores nemo blanditiis accusantium laudantium corrupti. Ut ut blanditiis ea ut distinctio ea in.', 'Minus quod qui libero. Tempora dolorem accusamus dolores labore. Ullam sint mollitia et labore. Minima eveniet accusamus et sunt.', 'Cum delectus et qui itaque necessitatibus fugit. Voluptate dolor iure quidem qui aut est.', 'et', 'Repellendus ut ab possimus veritatis. Porro placeat quod omnis totam eaque dolore. Hic ut provident sunt provident sed voluptas voluptas aut.', 'Vel explicabo atque aut nemo repellendus doloribus et ex. Blanditiis quod laboriosam reiciendis voluptatibus earum. Et sed eaque et itaque nihil temporibus. Deleniti nihil beatae porro et.', 'veritatis est labore minima aut dolores sint voluptas commodi est', 'Harum est consequuntur non enim voluptates eos quam consequatur.', '4 Weeks', '4', 'Consectetur ab nam facilis placeat ipsa magnam delectus. Consequatur illo dolorem officiis ea totam aut delectus. Explicabo qui suscipit in aspernatur reprehenderit quo.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(74, 'ByE59HjSV8tQ', 'Network Security Basics', 'wElWYnx', '10000', '1', 'els.png', 'Consectetur neque omnis voluptas numquam natus qui sed id. Impedit laborum consequuntur suscipit possimus quia sed.', 'Velit est inventore beatae ad est quam ipsa non. Rerum animi qui omnis quis ut quis. Odit quis consequatur eos deleniti molestiae aut assumenda.', 'Facere voluptate vel autem aut nihil. Repellat quo alias excepturi autem. Aspernatur esse tempore voluptatem. Error non qui mollitia omnis sequi illo.', 'Aut odit quia autem. Et quasi dolorem omnis debitis aspernatur illum. Laborum voluptatem tempora voluptatibus itaque qui. Totam non doloremque aut quia.', 'qui', 'Eum praesentium quos repellat. Et aut veritatis perspiciatis officiis nostrum. Temporibus recusandae ducimus voluptas velit et. Et porro quo et mollitia modi.', 'Autem omnis natus sed blanditiis ea consequatur sit. Sapiente est dolores repudiandae ea sequi dolor. Nam ullam nihil quia fuga voluptatem sed.', 'est eveniet molestias facilis tenetur dicta ullam ea aut eos', 'Voluptatem natus id quibusdam sit et.', '4 Weeks', '4', 'Eum et quia a. Officiis aut accusamus non quo aspernatur est. Hic officiis minima sit quia.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(75, 'ByE59HjSV8tQ', 'Time Series Forecasting', 'dkom0SA', '10000', '1', 'els.png', 'Et perferendis nisi a maiores cumque neque. Sed unde sed tenetur exercitationem repellat. Earum est aperiam suscipit quae placeat ipsum. Quo laudantium molestiae nemo atque eum molestiae.', 'Atque mollitia hic dolores corporis reiciendis et dolorum animi. Necessitatibus itaque et ea consequatur aut ipsa. Nisi praesentium eos nemo repellat quam animi est.', 'Enim sit fugiat est corrupti et. Repellat est porro iusto libero laborum ab. Aspernatur animi repellat eum voluptatem.', 'Expedita sit quaerat ab facere eos. Blanditiis eaque facere a accusantium. Eius mollitia eius id aspernatur. Asperiores exercitationem delectus sint eos libero.', 'suscipit', 'Aut omnis et suscipit ea. Exercitationem praesentium pariatur aut numquam iusto illo cupiditate.', 'Aut qui veritatis natus animi omnis placeat corporis. Sapiente mollitia ut et eius dolores fuga doloremque. Ducimus esse illo reprehenderit.', 'rerum temporibus eligendi neque omnis magni neque assumenda expedita dicta', 'Tenetur in fuga est neque omnis sunt ut.', '4 Weeks', '4', 'Aperiam sed ex magnam enim repellendus nobis. Et ab non porro rem qui. Earum facilis ipsum provident occaecati et asperiores facere. Voluptatibus soluta incidunt est beatae qui ut.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(76, 'ByE59HjSV8tQ', 'ML Model Deployment with Flask', 'dkom0SA', '10000', '1', 'els.png', 'Enim eius neque totam omnis voluptate ut aspernatur. Necessitatibus doloremque velit nemo minima blanditiis eos. Cum exercitationem ullam et ipsa. Repudiandae atque modi similique et et eum autem.', 'Sit et nostrum corrupti. Veniam est fugit sequi qui. Sint iusto totam et suscipit culpa est architecto unde. Cupiditate delectus ipsa tenetur.', 'Aut soluta eveniet maxime enim adipisci modi adipisci. Iure ut dolorem vitae et dolor rem sunt. Blanditiis saepe sed doloribus id et et voluptatem.', 'Sint illo sint nihil eligendi ut illum. Incidunt odit alias nesciunt voluptatem. Odit enim sequi adipisci eaque hic qui tenetur. Quae nihil voluptatem veritatis odit.', 'nisi', 'Impedit quasi quis ut ipsum corporis. Aperiam ad similique aspernatur aut autem impedit quod eum. Qui ullam consequuntur est optio eos voluptatibus tenetur. Consequatur quod id ullam est eos ullam accusantium.', 'Fuga fugiat fugit maiores ipsam quasi. Eum dolor nihil laudantium perspiciatis voluptatibus earum autem. Nemo commodi quo quos iure explicabo dolorem ipsam ducimus. Praesentium voluptas odit est sed eaque.', 'rerum voluptas occaecati qui ad occaecati eaque ipsam et voluptatem', 'Deleniti quia nesciunt velit.', '4 Weeks', '4', 'Quis voluptas est autem eius similique repellat ut. Natus ipsam quia ut harum. Beatae suscipit delectus odit consequatur a possimus. Enim laborum eos corrupti et. Sint officia assumenda nesciunt ducimus illum quae.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(77, 'ByE59HjSV8tQ', 'Go-to-Market Strategy', 'HCJPokK', '10000', '1', 'els.png', 'Id odio ea voluptatem in cum sit fuga excepturi. At ex porro aliquid perferendis aut. Autem alias dolor quia voluptatum ea in. Praesentium doloremque quis laborum officia eaque itaque repudiandae.', 'Sapiente hic hic optio ea. Voluptatem aliquid deleniti corrupti fuga quia sed. Corrupti libero aut non aperiam omnis praesentium.', 'Pariatur facilis voluptates illum quaerat consequuntur eius. Dolores ut quaerat commodi modi nihil. Et accusantium veritatis quod ab ea molestiae et quisquam.', 'Perspiciatis blanditiis ipsam repellat. Sed est quia velit sint ratione. Nostrum facere libero culpa. Totam non error quo cumque dolorum vel.', 'dolorem', 'Similique nemo aperiam repudiandae non vel. In ut in fuga. Rerum corporis architecto cum nihil nesciunt. Voluptates autem cum ut est sunt ipsam.', 'Architecto magni quibusdam sed. Mollitia excepturi quis nihil eaque quos cum suscipit. Voluptatem ea et voluptatem sint est.', 'et quia unde ut tempore asperiores repellat eum quia consequatur', 'Eaque ut ducimus repellat cupiditate quidem qui.', '4 Weeks', '4', 'Eos voluptas sit excepturi maxime accusamus. Eaque et magni aut ut eius. Sapiente possimus labore qui quidem officiis.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(78, 'ByE59HjSV8tQ', 'Infrastructure as Code with Terraform', 'i3duKSm', '10000', '1', 'els.png', 'Minima qui sit velit sint omnis soluta. Qui officia veritatis aliquam possimus. Laboriosam fugit assumenda veritatis officia blanditiis eveniet culpa quis. Dolorem veritatis hic ducimus voluptates.', 'Ut ut non et in. Est ut eaque ratione voluptas mollitia beatae et omnis. In laborum deserunt cumque blanditiis reiciendis.', 'Odit aliquam earum unde dolorum. Ducimus vel hic quasi facilis minus dolores cum. Eos ut a neque est.', 'Atque unde suscipit provident asperiores. Ea in voluptatem eligendi occaecati ipsam minima. Voluptatem veritatis non voluptates harum odit.', 'non', 'Perferendis doloribus rem sunt et voluptatem voluptas. Qui dolor qui vel. Beatae eum voluptates aut sit.', 'Et quis ut temporibus ut. Non veritatis reiciendis voluptatem eveniet provident quis molestiae. Culpa et doloribus aliquid voluptatem quibusdam in dignissimos.', 'velit est autem vitae aut facere non voluptatem possimus eligendi', 'Corporis nemo enim autem laudantium aliquam inventore sit.', '4 Weeks', '4', 'Maxime culpa similique possimus in. Tenetur enim quasi perferendis occaecati. Rem quas ipsam tempore a. Autem pariatur harum repellendus magni dolorem blanditiis asperiores nihil.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(79, 'ByE59HjSV8tQ', 'Big Data Analytics with Spark', 'bC5MrFD', '10000', '1', 'els.png', 'Voluptates odit voluptatum sed adipisci. Sed ab provident quos consequatur omnis vel. Voluptas cum optio quibusdam unde optio dolor. Distinctio molestias aut ut consequatur maxime.', 'Aut inventore accusamus non voluptatem enim. Quas amet inventore vero.', 'Nesciunt velit nihil dolorum a provident qui. Quisquam soluta laboriosam accusantium rerum dolorem aut aliquam provident. Dolorem sit dicta voluptatem saepe qui sed.', 'Aut quasi blanditiis velit consequatur iusto quia sunt. Laboriosam enim amet tempore qui.', 'dolor', 'Labore officia velit quaerat laborum provident libero. Omnis earum voluptas molestiae dolorum. Dolor fugiat voluptatem odio repudiandae aut.', 'Eos exercitationem aut error nesciunt repudiandae dolorum. Sit similique nulla facilis quibusdam pariatur commodi. Voluptas ut sed consectetur repellat dolor in quo ut.', 'veritatis atque dolor rerum sequi autem tenetur ipsam ipsa dicta', 'Maxime ea iusto in eos voluptates vitae tenetur omnis.', '4 Weeks', '4', 'Consequuntur id autem omnis quisquam ipsa praesentium dolorem. Voluptatibus inventore sit est. Delectus tempora enim ut ipsa velit in repudiandae. In repellendus doloribus ea voluptatem ipsum.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL),
(80, 'ByE59HjSV8tQ', 'Agile Development with Scrum', 'uJj4OgP', '10000', '1', 'els.png', 'Deleniti consectetur sed aspernatur ab delectus. Et et possimus laboriosam nobis alias corporis sapiente. Provident eveniet dolorem minus autem molestiae rerum delectus in.', 'Aut ut earum et dignissimos nihil. A rerum saepe omnis magnam. Sed magni omnis eius eius.', 'Soluta omnis est tempora quia iusto magni vel. Non quas ducimus praesentium vel voluptatem. Natus ipsam aliquam eum distinctio numquam in. Expedita vel velit nisi blanditiis in.', 'Autem asperiores quam aut sed sunt velit. Debitis culpa repudiandae exercitationem praesentium quidem quia iure. Dolores temporibus voluptas nihil doloribus occaecati. Veniam dolores eaque rerum qui assumenda. Illum odit perferendis quis illum et voluptatem et.', 'eius', 'Eius delectus est quos et laborum. Qui consequatur nihil natus excepturi iure et. Unde recusandae dolorum error rerum vel eum fuga.', 'Quam non maiores ratione voluptatem quia cupiditate. Earum quos dolorem excepturi doloremque. Enim consequatur dolores id ex.', 'quia iusto non minus commodi quos maiores aut aspernatur quo', 'Rerum eius enim enim et beatae omnis.', '4 Weeks', '4', 'Ut vitae et doloremque sunt quo placeat tempore. Et dolorem odit dolores est consequatur. Ea expedita unde aspernatur. Nisi sit aliquam ad explicabo.', '0', NULL, '2025-11-13 20:02:20', '2025-11-13 20:02:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_allocations`
--

CREATE TABLE `course_allocations` (
  `allocation_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT '5xPwOSQ',
  `userSlug` varchar(255) NOT NULL,
  `courseSlug` varchar(255) NOT NULL,
  `programSlug` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_allocation_histories`
--

CREATE TABLE `course_allocation_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'BP1H8dC',
  `allocationSlug` text NOT NULL,
  `previousUserSlug` text NOT NULL,
  `newUserSlug` text NOT NULL,
  `addedByUserSlug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_materials`
--

CREATE TABLE `course_materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text NOT NULL,
  `addedByUserSlug` text NOT NULL,
  `course_file` longtext NOT NULL,
  `courseSlug` text NOT NULL,
  `noteSlug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_notes`
--

CREATE TABLE `course_notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` text NOT NULL,
  `topic` longtext NOT NULL,
  `content` longtext NOT NULL,
  `title` longtext NOT NULL,
  `chapter` longtext NOT NULL,
  `link_one` text DEFAULT NULL,
  `link_two` text DEFAULT NULL,
  `link_three` text DEFAULT NULL,
  `link_four` text DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `addedByUserSlug` text NOT NULL,
  `instructorSlug` text NOT NULL,
  `allocatonSlug` text NOT NULL,
  `courseSlug` text NOT NULL,
  `programSlug` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'gk7Vf8W',
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `activities` varchar(255) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_21_160836_create_permission_tables', 1),
(5, '2025_10_21_164155_add_two_factor_columns_to_users_table', 1),
(6, '2025_10_23_091301_create_logs_table', 1),
(7, '2025_10_23_093410_create_programs_table', 1),
(8, '2025_10_23_093430_create_courses_table', 1),
(9, '2025_10_23_093443_create_course_allocations_table', 1),
(10, '2025_10_23_093509_create_faqs_table', 1),
(11, '2025_10_23_093524_create_blogs_table', 1),
(12, '2025_10_23_093538_create_partners_table', 1),
(13, '2025_10_23_094257_create_teams_table', 1),
(14, '2025_11_04_075143_create_course_allocation_histories_table', 1),
(15, '2025_11_04_122234_create_course_notes_table', 1),
(16, '2025_11_04_123157_create_course_materials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'Jme1QtU',
  `picture` varchar(255) NOT NULL,
  `partner_name` varchar(255) DEFAULT NULL,
  `others` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'uBLmqkt',
  `program_name` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `description` longtext DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`program_id`, `slug`, `program_name`, `banner`, `description`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 'Hm7VKLN', 'Web Development Bootcamp', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(2, 'bC5MrFD', 'Data Masterclass', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(3, 'pXftY6G', 'Design Fundamentals', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(4, 'wElWYnx', 'Cybersecurity Essentials', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(5, 'Rqo2KOn', 'Digital Marketing Strategy', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(6, 'uJj4OgP', 'Software Engineering Immersive', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(7, 'HCJPokK', 'Product Management Accelerator', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(8, 'i3duKSm', 'Cloud Computing & DevOps', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(9, 'dkom0SA', 'Artificial Intelligence & Machine Learning', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(10, 'V6HodKJ', 'Business Analytics & Intelligence', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(11, 'exD4HQP', 'Robotics Process Automation', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL),
(12, 'GMr7Ziu', 'Database Management Systems', 'els.png', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'web', NULL, NULL),
(2, 'Admin', 'web', NULL, NULL),
(3, 'Student', 'web', NULL, NULL),
(4, 'Instructor', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mWhl7X15uZqLuLc9Q3ZSyLESQfbIO7y8KV0xtPPm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36 Edg/142.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiN0xucHpwSHIwOU5RWFRHdlVZemdYUTR2QTJIMm5TM1pPc0pGbk5rYiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjYwOiJodHRwOi8vMTI3LjAuMC4xOjEyMzQvZGFzaGJvYXJkL2NvdXJzZXMvZGV0YWlscy9CeUU1OUhqU1Y4dFEiO3M6NToicm91dGUiO3M6MTE6ImNvdXJzZS5zaG93Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NjMwNjQxNzc7fX0=', 1763064194);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'pnuXjPg',
  `image` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `biography` text NOT NULL,
  `education` text NOT NULL,
  `speciality` text NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL DEFAULT 'bavPQsj',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `change_password` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `slug`, `first_name`, `last_name`, `email`, `phone_number`, `role`, `status`, `change_password`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'XVA5uKS', 'Taiwo', 'Adesina', 'tolajide74@gmail.com', '08138139333', 'Administrator', '1', '0', '$2y$12$YaTO9lpXzZ4bczQjTdymg.R6EO87TRKjG5MYZURt/lioZGCfpAlcS', NULL, NULL, NULL, '2025-11-13 20:02:17', NULL, '2025-11-13 20:02:17', '2025-11-13 20:02:17'),
(2, 'rwYi9uR', 'Olajide', 'Victor', 'tolajide75@gmail.com', '09072281204', 'Admin', '1', '0', '$2y$12$sSiTmMqfUn.JweDM6zLiVORAvRpBnW36tadie2hG4.hyo/csOrpFG', NULL, NULL, NULL, '2025-11-13 20:02:18', NULL, '2025-11-13 20:02:18', '2025-11-13 20:02:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_allocations`
--
ALTER TABLE `course_allocations`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `course_allocation_histories`
--
ALTER TABLE `course_allocation_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_materials`
--
ALTER TABLE `course_materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_notes`
--
ALTER TABLE `course_notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`program_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `blog_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `course_allocations`
--
ALTER TABLE `course_allocations`
  MODIFY `allocation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_allocation_histories`
--
ALTER TABLE `course_allocation_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_materials`
--
ALTER TABLE `course_materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_notes`
--
ALTER TABLE `course_notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `program_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
