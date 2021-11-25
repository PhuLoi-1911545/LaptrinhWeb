    <!-- Footer -->
    <div class="footer">
        <div class="py-3 container">
            <p class="mb-0 text-center">2021 All rights reserved, Assignment WEB</p>
        </div>
    </div>

    
    <?php
        if ($_SERVER['SCRIPT_NAME'] == "/assignmentWEB/manager_page/index.php") {
            ?>
                <script src="../js/app.js"></script>
            <?php
        }
        else {
            ?>
                <script src="../../js/app.js"></script>
            <?php
        }
    ?>
</body>
</html>