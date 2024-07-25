<!DOCTYPE html>
<html>
<head>
    <title>Projects</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }
        .box {
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            transition: transform 0.3s ease, width 0.3s ease, height 0.3s ease;
            cursor: pointer;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            border-radius: 10px;
        }
        .box:hover {
            transform: scale(1.05);
        }
        .register-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        .expanded {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            padding: 20px;
            background-color: white;
            overflow: auto;
        }
        .expanded .box-content {
            width: auto;
        }
    </style>
</head>
<body>

<?php
// Sample content for each box
$boxes = array(
    array(
        "title" => "E-commerce Website Development",
        "description" => " Design and develop a fully functional e-commerce website where users can browse products, add them to their cart, and securely check out",
        "skills" =>  array("Web development (HTML, CSS, JavaScript)", "backend development (Python, Ruby, Node.js)", "database management (SQL, MongoDB)", "UI/UX design, payment gateway integration."),
    ),
    array(
        "title" => "Mobile App for Fitness Tracking",
        "description" => "Create a mobile application that allows users to track their fitness activities, set goals, and monitor their progress over time",
        "skills" => array(" Mobile app development (iOS/Android)", "programming languages (Swift, Kotlin)", "database management (SQLite, Firebase)", "user authentication, data visualization."),
    ),
    array(
        "title" => "Machine Learning-Based Recommendation System",
        "description" => " Build a recommendation system that analyzes user preferences and behavior to suggest personalized content, such as movies, books, or products",
        "skills" => array("Machine learning (Python, scikit-learn, TensorFlow)", "data analysis", "recommendation algorithms (collaborative filtering, content-based filtering)", "database management, API integration"),
    ),
    array(
        "title" => "Social Media Analytics Dashboard",
        "description" => " Create a dashboard that collects and analyzes data from social media platforms (Twitter, Facebook, Instagram) to provide insights into user engagement, sentiment analysis, and trending topics",
        "skills" => array("Data mining, natural language processing (NLP)", "data visualization (Matplotlib, Plotly)", "web scraping, API integration, backend development."),
    ),
    array(
        "title" => "Smart Home Automation System",
        "description" => " Develop a system that allows users to control various smart home devices (lights, thermostats, locks) through a central interface, either a mobile app or a web application.",
        "skills" => array("Internet of Things (IoT) development", "embedded systems", "mobile/web development", "protocols (MQTT, Zigbee)", "backend development", "cybersecurity."),
    ),
);

// Loop through each box and display its content
foreach ($boxes as $box) {
    echo '<div class="box" onclick="expandBox(this)">';
    echo '<h2>' . $box["title"] . '</h2>';
    echo '<p><strong>Description:</strong> ' . $box["description"] . '</p>';
    echo '<p><strong>Skills:</strong></p>';
    echo '<ul>';
    foreach ($box["skills"] as $skill) {
        echo '<li>' . $skill . '</li>';
    }
    echo '</ul>';
    echo '<a href="registration.php" class="register-btn">Register</a>';
    echo '</div>';
}
?>

<script>
    function expandBox(element) {
        element.classList.toggle('expanded');
    }
</script>

</body>
</html>