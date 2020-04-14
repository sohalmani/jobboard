-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 22, 2025 at 07:23 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `first_name`, `last_name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'Maninder', 'Sohal', 'manisohal837@gmail.com', 'Need Software Development Job', 'I need a software development job!!', '2024-11-22 17:42:45'),
(2, 'Mani', 'Sohal', 'manisohal837@gmail.com', 'Need Software Development Job', 'I need a software development job. Please help...', '2025-05-05 03:23:11'),
(3, 'Mani', 'Sohal', 'manisohal837@gmail.com', 'Need Software Development Job', 'I need a software development job, please help...', '2025-05-05 03:24:25');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `vacancies` int(11) NOT NULL,
  `application_deadline` date NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text,
  `requirements` text,
  `benefits` text,
  `company_name` varchar(255) NOT NULL,
  `company_logo` varchar(255) DEFAULT NULL,
  `published_on` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `type`, `location`, `region`, `experience`, `salary`, `vacancies`, `application_deadline`, `description`, `responsibilities`, `requirements`, `benefits`, `company_name`, `company_logo`, `published_on`) VALUES
(1, 1, 'Product Designer', 'Part Time', 'NY', 'New York', '2+ years', '$60k - $80k', 1, '2024-01-15', 'Design user-centric products for Adidas\' new collection.\r\nConduct user research to understand consumer behavior.\r\nCreate high-quality prototypes and detailed design specifications.\r\nCollaborate with developers to ensure seamless implementation of designs.', 'Collaborate with design teams to create innovative product concepts.\r\nStay updated on current design trends and consumer preferences.\r\nParticipate in brainstorming sessions to generate new ideas.\r\nProvide feedback and suggestions for continuous product improvement.', 'Bachelor\'s degree in Design, Arts, or a related field.\r\nProficiency in Figma, Adobe Creative Suite, and prototyping tools.\r\nStrong portfolio showcasing user-centered design projects.\r\nExcellent communication and presentation skills.', 'Employee discounts on Adidas products.\r\nFlexible working hours to balance work-life.\r\nOpportunities for professional training and development.\r\nInclusive and diverse work environment.', 'Adidas', 'job_logo_1.jpg', '2023-12-02 00:00:00'),
(2, 2, 'Digital Marketing Director', 'Full Time', 'Overland Park, KS', 'Kansas', '5+ years', '$120k - $140k', 1, '2024-01-31', 'Lead and execute digital marketing campaigns across multiple platforms.\nAnalyze campaign performance to optimize ROI and customer engagement.\nDevelop innovative strategies to increase Sprint\'s digital presence.\nWork closely with the sales team to align marketing goals.', 'Oversee all aspects of digital marketing strategies.\nCollaborate with content creators to produce engaging material.\nUtilize SEO and SEM best practices for website traffic growth.\nMonitor competitor strategies and adjust campaigns accordingly.', 'Bachelor\'s degree in Marketing, Business Administration, or related field.\nProven experience in leading marketing campaigns with measurable success.\nExpertise in tools like Google Analytics, SEMrush, and HubSpot.\nStrong understanding of SEO, SEM, and content marketing.', 'Comprehensive health insurance and retirement plans.\nPerformance-based bonuses and profit-sharing opportunities.\nRemote work options and flexible schedules.\nOpportunities for career advancement and skill enhancement.', 'Sprint', 'job_logo_2.jpg', '2023-12-02 00:00:00'),
(3, 3, 'Back-end Engineer (Python)', 'Full Time', 'Overland Park, KS', 'Kansas', '4+ years', '$110k - $130k', 2, '2024-01-20', 'Build scalable, secure, and efficient back-end systems for Amazon.\nOptimize server-side logic to ensure high performance and reliability.\nDevelop RESTful APIs and integrate them with front-end components.\nCollaborate with data scientists to deploy machine learning models.', 'Write clean, modular, and reusable code for back-end services.\nDebug and troubleshoot complex technical issues in production systems.\nImplement best practices for database design and query optimization.\nStay updated with the latest Python and back-end technologies.', 'Bachelor\'s degree in Computer Science or a related discipline.\nExpertise in Python, Django, and Flask frameworks.\nFamiliarity with SQL and NoSQL databases such as PostgreSQL and MongoDB.\nStrong problem-solving and analytical skills.', 'Health and wellness benefits, including dental and vision plans.\nStock options and annual performance bonuses.\nAccess to Amazon\'s cutting-edge technology resources.\nSupport for professional certifications and training programs.', 'Amazon', 'job_logo_3.jpg', '2023-12-02 00:00:00'),
(4, 4, 'Senior Art Director', 'Full Time', 'Anywhere', 'Remote', '6+ years', '$130k - $160k', 1, '2024-01-31', 'Develop and oversee creative direction for Microsoft’s major campaigns.\nCreate visual strategies that align with brand goals and identity.\nCollaborate with cross-functional teams to produce high-quality outputs.\nSupervise junior designers and ensure adherence to brand guidelines.', 'Brainstorm and conceptualize creative ideas for projects.\nEnsure designs meet the highest quality standards and deadlines.\nWork closely with clients and stakeholders to capture their vision.\nStay updated with industry trends and incorporate them into designs.', 'Bachelor\'s or Master\'s degree in Art, Design, or related fields.\nExtensive experience in branding, advertising, and graphic design.\nProficiency in tools like Adobe Creative Suite, Sketch, and Figma.\nProven leadership and mentorship skills.', 'Comprehensive health insurance, including mental health support.\nRemote work flexibility with occasional on-site team-building events.\nAccess to state-of-the-art design tools and resources.\nOpportunities for international travel and exposure.', 'Microsoft', 'job_logo_4.jpg', '2023-12-02 00:00:00'),
(5, 5, 'Product Designer', 'Full Time', 'San Mateo, CA', 'California', '3+ years', '$85k - $110k', 1, '2024-01-25', 'Design innovative and user-friendly products that align with Puma\'s brand.\nConduct market research to understand consumer needs and preferences.\nDevelop prototypes and user interfaces for review and feedback.\nCollaborate with marketing teams to ensure product success.', 'Work closely with cross-functional teams to meet project deadlines.\nParticipate in workshops and user testing sessions.\nImprove existing products based on user feedback and market trends.\nEnsure all designs are optimized for manufacturability and scalability.', 'Bachelor\'s degree in Design, Product Development, or related fields.\nProficiency in Sketch, Adobe XD, and rapid prototyping tools.\nStrong knowledge of user-centered design methodologies.\nAbility to handle multiple projects in a fast-paced environment.', 'Competitive compensation package with performance bonuses.\nHealth benefits, including dental and vision coverage.\nExclusive employee discounts on Puma products.\nOpportunities for career growth and innovation workshops.', 'Puma', 'job_logo_5.jpg', '2023-12-02 00:00:00'),
(6, 1, 'UI/UX Designer', 'Full Time', 'Portland, OR', 'Oregon', '3+ years', '$75k - $95k', 2, '2024-01-30', 'Create user-centric designs for Adidas\' online platforms.\nConduct usability testing and analyze user feedback.\nDevelop interactive prototypes and wireframes.\nEnsure designs align with Adidas\' branding and visual identity.', 'Collaborate with developers and product teams to implement designs.\nStay updated on UI/UX trends and best practices.\nOptimize designs for mobile and web platforms.\nDeliver high-quality assets and ensure a seamless user experience.', 'Bachelor\'s degree in Design, Human-Computer Interaction, or related fields.\nProficiency in tools like Figma, Sketch, and Adobe XD.\nStrong portfolio showcasing UI/UX projects.\nExcellent communication and collaboration skills.', 'Health insurance, including vision and dental.\nOpportunities for professional development and training.\nAccess to Adidas discounts and employee-exclusive collections.\nFlexible work environment and generous PTO.', 'Adidas', 'job_logo_1.jpg', '2023-12-02 00:00:00'),
(7, 2, 'SEO Specialist', 'Full Time', 'Overland Park, KS', 'Kansas', '2+ years', '$70k - $85k', 1, '2024-01-31', 'Analyze and improve Sprint\'s search engine rankings.\nPerform keyword research to identify opportunities.\nOptimize on-page and off-page SEO strategies.\nMonitor website analytics and make data-driven decisions.', 'Implement technical SEO audits and fixes.\nCollaborate with content creators to enhance SEO performance.\nStay updated with Google algorithm changes.\nGenerate monthly reports on SEO performance and recommendations.', 'Bachelor\'s degree in Marketing, Communications, or related field.\nExperience with SEO tools like SEMrush, Ahrefs, and Moz.\nStrong understanding of HTML, CSS, and website optimization.\nExcellent analytical and problem-solving skills.', 'Competitive salary with annual performance bonuses.\nComprehensive benefits, including health and retirement plans.\nOpportunities to attend industry conferences and certifications.\nHybrid work model with flexible hours.', 'Sprint', 'job_logo_2.jpg', '2023-12-02 00:00:00'),
(8, 3, 'Cloud Architect', 'Full Time', 'Seattle, WA', 'Washington', '7+ years', '$150k - $180k', 1, '2024-02-15', 'Design and implement scalable cloud solutions for Amazon.\nCollaborate with engineering teams to optimize infrastructure.\nEnsure security and compliance in cloud architectures.\nLead migrations from on-premises to AWS cloud.', 'Develop cloud strategy and roadmap for enterprise solutions.\nTroubleshoot complex cloud infrastructure issues.\nProvide mentorship to junior engineers and architects.\nStay updated on the latest AWS services and cloud trends.', 'Bachelor\'s or Master\'s degree in Computer Science or IT.\nExtensive experience with AWS, Azure, or Google Cloud.\nStrong expertise in microservices, containers, and DevOps practices.\nExcellent communication and leadership skills.', 'Health benefits, including mental wellness programs.\nEmployee stock purchase plan and annual bonuses.\nAccess to cutting-edge cloud training and certifications.\nFlexible working hours and work-from-home options.', 'Amazon', 'job_logo_3.jpg', '2023-12-02 00:00:00'),
(9, 4, 'Data Scientist', 'Full Time', 'Redmond, WA', 'Washington', '4+ years', '$140k - $170k', 1, '2024-02-01', 'Build predictive models and algorithms to analyze data trends.\nCollaborate with teams to solve business challenges using data.\nDevelop dashboards to visualize and present key insights.\nEnsure data accuracy and integrity in all analyses.', 'Analyze large datasets to extract actionable insights.\nOptimize machine learning models for production use.\nPresent findings to stakeholders in clear, concise formats.\nWork with data engineers to ensure seamless data pipelines.', 'Master\'s degree in Data Science, Statistics, or related fields.\nProficiency in Python, R, SQL, and data visualization tools.\nExperience with cloud platforms like Azure, AWS, or GCP.\nStrong understanding of machine learning and AI techniques.', 'Comprehensive health and retirement benefits.\nAccess to Microsoft\'s global data resources.\nOpportunities for skill advancement through workshops.\nInclusive and diverse work environment.', 'Microsoft', 'job_logo_4.jpg', '2023-12-02 00:00:00'),
(10, 5, 'Marketing Analyst', 'Full Time', 'Boston, MA', 'Massachusetts', '3+ years', '$70k - $90k', 1, '2024-01-20', 'Analyze marketing campaigns to assess ROI and effectiveness.\nDevelop reports on customer behavior and preferences.\nCollaborate with marketing teams to optimize strategies.\nUse data-driven insights to improve Puma\'s brand positioning.', 'Collect and analyze data from various marketing channels.\nMonitor competitor activities and market trends.\nWork with product teams to ensure market alignment.\nCreate visualizations to communicate findings to stakeholders.', 'Bachelor\'s degree in Marketing, Business, or Data Analytics.\nProficiency in tools like Google Analytics, Tableau, and Excel.\nStrong analytical and problem-solving skills.\nExcellent written and verbal communication.', 'Competitive salary and performance-based incentives.\nEmployee discounts on Puma products and collections.\nAccess to skill-building workshops and certifications.\nCollaborative and innovative work environment.', 'Puma', 'job_logo_5.jpg', '2023-12-02 00:00:00'),
(11, 1, 'Frontend Developer', 'Full Time', 'Portland, OR', 'Oregon', '4+ years', '$90k - $110k', 2, '2024-02-10', 'Develop user-friendly web applications for Adidas customers.\nEnsure responsiveness and performance of applications.\nCollaborate with backend developers for seamless integration.\nFix bugs and improve the existing codebase.', 'Build modern, interactive UIs using React.js or similar libraries.\nWrite clean, maintainable, and scalable code.\nStay updated with the latest front-end technologies.\nPerform code reviews to ensure high-quality output.', 'Bachelor\'s degree in Computer Science or similar.\nStrong experience with HTML, CSS, JavaScript, and React.js.\nKnowledge of Git, Webpack, and modern development tools.\nExcellent problem-solving skills and attention to detail.', 'Comprehensive health and vision benefits.\nOpportunities for growth within the Adidas tech team.\nAccess to exclusive Adidas collections and discounts.\nWork-from-home options with flexible schedules.', 'Adidas', 'job_logo_1.jpg', '2023-12-02 00:00:00'),
(12, 3, 'Machine Learning Engineer', 'Full Time', 'Seattle, WA', 'Washington', '5+ years', '$160k - $190k', 1, '2024-02-28', 'Develop and deploy ML models for Amazon\'s business needs.\nWork on large datasets to train and validate models.\nCollaborate with teams to integrate ML solutions into applications.\nContinuously monitor and optimize models in production.', 'Build pipelines for data collection and preprocessing.\nExperiment with different ML algorithms to achieve optimal results.\nDocument findings and communicate them to stakeholders.\nStay updated with advancements in ML and AI technologies.', 'Master\'s degree in AI, Data Science, or related fields.\nStrong programming skills in Python, TensorFlow, and PyTorch.\nExperience with cloud platforms like AWS or Azure.\nExcellent understanding of supervised and unsupervised learning.', 'Competitive salary with performance-based incentives.\nAccess to Amazon\'s state-of-the-art AI infrastructure.\nComprehensive benefits, including stock options and 401(k).\nOpportunities to work on cutting-edge AI projects.', 'Amazon', 'job_logo_3.jpg', '2023-12-02 00:00:00'),
(19, 2, 'Cybersecurity Specialist', 'Part Time', 'New York, NY', 'New York', '5+ years', '$110k - $130k', 1, '2024-02-20', '<p>Ensure the security of Sprint\'s IT infrastructure and data.\r\nConduct regular vulnerability assessments and penetration tests.\r\nImplement and maintain security protocols and tools.\r\nRespond to and investigate cybersecurity incidents.</p>', '<p>Develop strategies to mitigate cyber risks and threats.\r\nCollaborate with teams to enforce security best practices.\r\nDocument and report security incidents and resolutions.\r\nStay updated on emerging cybersecurity threats and technologies.</p>', '<p>Bachelor\'s degree in IT, Cybersecurity, or related field.\r\nCertifications like CISSP, CEH, or CISM are a plus.\r\nExperience with firewalls, SIEM tools, and threat analysis.\r\nStrong problem-solving and critical-thinking skills.</p>', '<p>Competitive salary and comprehensive benefits package.\r\nOpportunities to attend cybersecurity conferences and training.\r\nFlexible work hours and work-from-home options.\r\nCollaborative and supportive team environment.</p>', 'Sprint', 'job_logo_2.jpg', '2023-12-03 00:00:00'),
(20, 3, 'Database Administrator', 'Full Time', 'Seattle, WA', 'Washington', '5+ years', '$130k - $150k', 1, '2024-02-25', 'Manage Amazon\'s databases and ensure optimal performance.\nImplement data security protocols and backup systems.\nTroubleshoot and resolve database issues efficiently.\nOptimize SQL queries and database configurations.', 'Monitor database health and performance metrics.\nCollaborate with developers to enhance database operations.\nDocument database processes and maintenance activities.\nStay updated on database technologies and trends.', 'Bachelor\'s degree in IT, Computer Science, or related fields.\nProficiency in SQL, Oracle, and NoSQL databases.\nStrong knowledge of database security and optimization.\nExcellent analytical and troubleshooting skills.', 'Comprehensive health insurance and retirement plans.\nAccess to Amazon\'s professional development programs.\nOpportunities for career advancement within Amazon.\nWork in a diverse and inclusive environment.', 'Amazon', 'job_logo_3.jpg', '2023-12-03 00:00:00'),
(21, 1, 'UX Researcher', 'Full Time', 'Austin', 'Kansas', '3+ years', '$85k - $105k', 1, '2024-02-10', 'Conduct user research to improve Adidas product experiences.\r\nPlan and execute usability testing for digital platforms.\r\nAnalyze user data and provide actionable insights.\r\nCollaborate with design teams to ensure user-centric solutions.', 'Design and execute qualitative and quantitative research.\r\nCommunicate findings to stakeholders with clear reports.\r\nCreate personas and user journey maps.\r\nStay updated with UX trends and methodologies.', 'Bachelor\'s degree in Human-Computer Interaction, Psychology, or related field.\r\nProficiency in research tools like Hotjar, Google Analytics, or UserTesting.\r\nStrong analytical and communication skills.\r\nExperience working in agile environments.', 'Health, vision, and dental benefits for employees.\r\nOpportunities for professional development and training.\r\nFlexible work hours and hybrid work options.\r\nExclusive discounts on Adidas products.', 'Adidas', 'job_logo_1.jpg', '2023-12-03 00:00:00'),
(22, 2, 'Network Administrator', 'Full Time', 'Chicago, IL', 'Illinois', '4+ years', '$95k - $115k', 1, '2024-02-15', 'Manage and maintain Sprint’s IT network infrastructure.\nMonitor network performance and troubleshoot issues.\nImplement network security measures to protect data.\nUpgrade hardware and software as needed to enhance system performance.', 'Oversee daily operations of network systems.\nCollaborate with IT teams to ensure seamless connectivity.\nDocument network configurations and operational processes.\nStay updated with advancements in networking technology.', 'Bachelor\'s degree in IT, Computer Science, or related fields.\nProficiency in network protocols, firewalls, and routers.\nExperience with tools like Cisco, Juniper, and Wireshark.\nStrong analytical and problem-solving skills.', 'Competitive salary and comprehensive benefits.\nAccess to cutting-edge network tools and technologies.\nOpportunities for professional certifications (CCNA, CCNP).\nFlexible work environment and PTO.', 'Sprint', 'job_logo_2.jpg', '2023-12-03 00:00:00'),
(23, 3, 'Product Manager', 'Full Time', 'Dallas, TX', 'Texas', '6+ years', '$150k - $180k', 1, '2024-02-20', 'Define product strategies and manage the product lifecycle.\nCollaborate with cross-functional teams to deliver high-quality products.\nAnalyze market trends to identify new product opportunities.\nEnsure customer satisfaction through product improvements.', 'Work with engineering teams to define product requirements.\nDevelop roadmaps and prioritize feature rollouts.\nMonitor product performance and implement necessary changes.\nPresent product updates to stakeholders and leadership teams.', 'MBA or equivalent experience in product management.\nStrong leadership and project management skills.\nExperience with agile methodologies and tools like Jira.\nProficiency in data analysis tools like Tableau or Excel.', 'Comprehensive salary and benefits package.\nOpportunities for career advancement within Amazon.\nFlexible work hours and remote work options.\nAccess to Amazon’s professional development programs.', 'Amazon', 'job_logo_3.jpg', '2023-12-03 00:00:00'),
(24, 4, 'Data Scientist', 'Full Time', 'Redmond, WA', 'Washington', '5+ years', '$135k - $160k', 2, '2024-02-25', 'Develop data models and predictive algorithms to drive insights.\nCollaborate with teams to solve business problems using data.\nVisualize complex datasets for easy interpretation by stakeholders.\nStay updated with advancements in data science and AI.', 'Analyze large datasets to uncover trends and patterns.\nBuild machine learning models to optimize business processes.\nCommunicate findings through reports and dashboards.\nCollaborate with engineers to deploy models into production.', 'Master\'s degree in Data Science, Statistics, or related fields.\nExperience with Python, R, and data visualization tools.\nProficiency in machine learning frameworks like TensorFlow or PyTorch.\nStrong understanding of data processing pipelines.', 'Competitive salary and comprehensive benefits.\nOpportunities to work on cutting-edge AI projects.\nFlexible work arrangements and remote options.\nAccess to Microsoft’s learning resources and certifications.', 'Microsoft', 'job_logo_4.jpg', '2023-12-03 00:00:00'),
(25, 5, 'Social Media Manager', 'Full Time', 'Miami, FL', 'Florida', '3+ years', '$65k - $85k', 1, '2024-02-28', 'Develop and manage Puma\'s social media strategies and campaigns.\nCreate engaging content to grow social media presence.\nAnalyze social media metrics and adjust strategies accordingly.\nCollaborate with marketing teams to ensure brand consistency.', 'Plan, schedule, and publish social media posts.\nEngage with followers and respond to customer queries.\nTrack and report on social media performance metrics.\nStay updated with trends and emerging social media platforms.', 'Bachelor\'s degree in Marketing, Communications, or related fields.\nProficiency in social media platforms and tools like Hootsuite.\nStrong writing and creative skills.\nExperience in running paid social media campaigns.', 'Competitive salary and annual performance bonuses.\nAccess to Puma-exclusive events and discounts.\nOpportunities for career growth and certifications.\nCollaborative and inclusive work environment.', 'Puma', 'job_logo_5.jpg', '2023-12-03 00:00:00'),
(26, 5, 'Social Media Manager', 'Full Time', 'Miami, FL', 'Florida', '3+ years', '$65k - $85k', 1, '2024-02-28', 'Develop and manage Puma\'s social media strategies and campaigns.\r\nCreate engaging content to grow social media presence.\r\nAnalyze social media metrics and adjust strategies accordingly.\r\nCollaborate with marketing teams to ensure brand consistency.', 'Plan, schedule, and publish social media posts.\r\nEngage with followers and respond to customer queries.\r\nTrack and report on social media performance metrics.\r\nStay updated with trends and emerging social media platforms.', 'Bachelor\'s degree in Marketing, Communications, or related fields.\r\nProficiency in social media platforms and tools like Hootsuite.\r\nStrong writing and creative skills.\r\nExperience in running paid social media campaigns.', 'Competitive salary and annual performance bonuses.\r\nAccess to Puma-exclusive events and discounts.\r\nOpportunities for career growth and certifications.\r\nCollaborative and inclusive work environment.', 'Puma', 'job_logo_5.jpg', '2023-12-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `status`, `created_at`) VALUES
(1, 'careers@adidas.com', '$2y$10$WYhI4x8HJep7LoZUUWPIbuQp/GzThgT9a2jBlBJCetZSewnf8dY5i', 'active', '2025-05-20 10:50:46'),
(2, 'jobs@sprint.com', '$2y$10$HHCR65iVJZK71X/pWmW8UOp32/zMpis.4Iwj.ezSdfWBfyNB2PXey', 'active', '2025-05-20 10:50:46'),
(3, 'jobs@amazon.com', '$2y$10$0t4wpjQmHY4OY8QyCE8fGeDTFwOOTifeWqKVzRA0dFoM0jyRvLIGq', 'active', '2025-05-20 10:50:46'),
(4, 'careers@microsoft.com', '$2y$10$pIysv.HAY5zKMFur0DoX0eXLM/bY1bHAHe6hxPRBpCQdPtXxiKGCy', 'active', '2025-05-20 10:50:46'),
(5, 'careers@puma.com', '$2y$10$9QGFWQ26wKuWLNQS0IKhdOYMHsD.NFxHGuvVj82fowx0NDri2UUcu', 'active', '2025-05-20 10:50:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
