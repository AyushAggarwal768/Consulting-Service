<?php
include './dbconfig.php';
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>About Us - Consulting Service</title>
        <link href="stylesheet/style.css" rel="stylesheet" type="text/css" />
        <link href="stylesheet/menu.css" rel="stylesheet" type="text/css" />
        <link type="text/css" href="stylesheet/left-panel.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/crawler.js"></script>
        <script type="text/javascript" src="js/menu.js"></script>
        <script type="text/javascript" src="js/menu1.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="container">
                <div id="header">
                    <?php
                    include('header.php');
                    ?>
                </div>
                <div id="center-page" style="height: 750px;">
                    <div class="content">
                        <div class="text_content">
                            <h2>About Us</h2>
                            <p>Ease Consulting is a web-based application for primarily providing Services to Companies who hire
                                Consultants from vendors/suppliers. The objective of this application is to reduce administrative costs by
                                automating the workflow. Timesheet management can be completely automated using this application.
                                The application needs to be developed using PHP and MySQL as the backend and HTML, javascript and
                                CSS as the front end.</p>                        
                            <p>
                                This Application is useful for preparing the timesheets, which are entered by the consultants. Time sheet
                                consists of company and project details and for each task like coding, design, testing, and documentation
                                etc, the number of hours they worked throughout the week. Consultants having the permission to enter the
                                time sheet. Also can check different types of reports based on project or client wise. These entered Time
                                sheets can be approved or rejected by the Manager (approver). This approving the time sheets is done by
                                manager at the end of week by selecting option called week ending dates. At the manager’s login there are
                                reports based on different search criteria. To maintain the details of users, projects, consultants, permission
                                to login users and define the new roles can be done at administrative tasks. This application is maintaining
                                three types of logins consultant, manager and administrator. Consultant can act as timesheet entry or
                                expense sheet entry. Manager role is to approve the time sheet or expense sheet. And admin maintain all
                                the details of consultants, managers, projects and roles. This reduces administrative costs for the company
                                side
                            </p>    
                            <p>
                                Consulting Organization is a web-based application for providing Services to Companies who hire
                                Consultants from vendors/suppliers. The main aim of this application is to Reduce Administrative costs by
                                automating the workflow (via Web) taking place between the people in the Company and the people from
                                the vendor organizations.<br/><br/>
                                <strong>Problems in Existing System</strong><br/>
                                <ul>
                                    <li>
                                        Existing system has tracking of time sheet information manually. It is a laborious process to track
                                        the work done by each and every individual in the organization.
                                    </li>
                                    <li>Hourly tracking of work is not possible in manual process.</li>
                                    <li>
                                        If the work has to be handed over to another person, keeping track of work done by the
                                        previous person and then tracking of task of the new person is a difficult job.
                                        Future Scope of the Project
                                    </li>
                                </ul>                                
                            </p>
                            <p>
                                The project has met the standards required to prepare the timesheets by consultants, these
                                approved by managers. For companies there are number of reports on different search criteria. And
                                also maintained administrative tasks like creating new consultants info and project details. Also
                                different permission sets defined. If the business logic remains same the project can be ported to any
                                Company with minor changes in the working procedure of the project. The project can be used as an
                                availability to develop a project for a different company with different business logic wherein the
                                commonalties in certain areas remain the same at any business level. By using the common features
                                in future development the development time as well as the cost of development can be decreased
                                considerably.
                            </p>

                        </div>
                    </div>
                </div>
                <?php
                include('footer.php');
                ?>
            </div>
        </div>
    </body>
</html>
