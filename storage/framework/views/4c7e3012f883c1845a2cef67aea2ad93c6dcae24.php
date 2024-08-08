<!-- Custom CSS (styles.blade.php or styles.css) -->
<style>
    .side-panel {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        background-color: #fff;
        padding-top: 20px;
        overflow-y: auto;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        transform: translateX(0); /* Visible by default */
    }

    .side-panel.hidden {
        transform: translateX(-100%); /* Hide the side panel */
    }

    .side-panel ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .side-panel ul li {
        margin-bottom: 10px;
    }

    .side-panel ul li a {
        display: block;
        padding: 10px;
        color: #333;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .side-panel ul li a:hover {
        background-color: #f0f0f0;
    }

    .main-content {
        transition: margin-left 0.3s ease;
        margin-left: 250px; /* Adjust according to sidebar width */
    }

    .main-content.expanded {
        margin-left: 0;
    }

    .toggle-btn {
        position: fixed;
        top: 20px;
        left: 250px; /* Adjust according to sidebar width */
        z-index: 1000;
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: left 0.3s ease;
    }

    .toggle-btn.hidden {
        left: 10px; /* Adjust position when side panel is hidden */
    }
</style>
<?php /**PATH F:\bookscity\resources\views/styles.blade.php ENDPATH**/ ?>