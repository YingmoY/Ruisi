<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学习报告生成器</title>
</head>
<body>
    <h2>学习报告生成器</h2>
    
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="date">日期：</label>
        <input type="date" id="date" name="date" required><br><br>
        
        <label for="studentName">学生姓名：</label>
        <input type="text" id="studentName" name="studentName" required><br><br>
        
        <label for="studyTime">学习时间：</label>
        <input type="text" id="studyTime" name="studyTime" required><br><br>
        
        <label for="studyContent">今日学习内容：</label>
        <input type="text" id="studyContent" name="studyContent" required><br><br>
        <script>  
            document.getElementById('studyContent').value='Unit~Unit';  
        </script>
        
        <label for="vocabularyCount">学习/复习词汇量：</label>
        <input type="text" id="vocabularyCount" name="vocabularyCount" required><br><br>
        
        <label for="dictationAccuracy">默写正确率：</label>
        <input type="text" id="dictationAccuracy" name="dictationAccuracy"><br><br>
        <script>  
            document.getElementById('dictationAccuracy').value='%';  
        </script>
        
        <label for="softwareAccuracy">软件正确率：</label>
        <input type="text" id="softwareAccuracy" name="softwareAccuracy"><br><br>
        <script>  
            document.getElementById('softwareAccuracy').value='%';  
        </script>
        
        <label for="comment">学习态度及课堂表现：</label><br>
        <textarea id="comment" name="comment" rows="6" cols="50" required></textarea><br><br>
        
        <label for="dictationScores">默写情况：</label><br>
        <textarea id="dictationScores" name="dictationScores" rows="4" cols="50"></textarea><br><br>
        
        <label for="wordsToReview">需要注意复习的单词：</label><br>
        <textarea id="wordsToReview" name="wordsToReview" rows="2" cols="50">no信封中的单词</textarea><br><br>
        
        <label for="homework">今日作业：</label><br>
        <textarea id="homework" name="homework" rows="2" cols="50" required>
完成pad推送的任务
复习no信封中的单词</textarea><br><br>
        
        <input type="submit" value="生成报告">
    </form>
    
    <?php
        // 检查表单是否已提交
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // 获取表单数据
            $date = $_POST["date"];
            $studentName = $_POST["studentName"];
            $studyTime = $_POST["studyTime"];
            $studyContent = $_POST["studyContent"];
            $vocabularyCount = $_POST["vocabularyCount"];
            $dictationAccuracy = $_POST["dictationAccuracy"];
            $softwareAccuracy = $_POST["softwareAccuracy"];
            $comment = $_POST["comment"];
            $dictationScores = $_POST["dictationScores"];
            $wordsToReview = $_POST["wordsToReview"];
            $homework = $_POST["homework"];
            
            // 输出学习报告
            echo "<h2>{$date} {$studentName} Report</h2>";
            echo "《单词速记素质能力课程》</br>";
            
            // 学习速记学习情况及反馈
            echo "<h3>① 单词速记学习情况及反馈：</h3></br>";
            echo "<p><strong>🎓学生: {$studentName}</strong></p>";
            echo "<p>⏰ 学习时间：{$studyTime}</p>";
            echo "<p>📍 今日学习内容：{$studyContent}</p>";
            echo "<p>📖学习/复习词汇量：{$vocabularyCount}</p>";
            
            // 默写正确率
            if (!empty($dictationAccuracy)) {
            echo "<p>📈默写正确率：{$dictationAccuracy}</p>";
            }

            // 软件正确率
            if (!empty($softwareAccuracy)) {
            echo "<p>🏷软件正确率：{$softwareAccuracy}</p>";
            }

            // 学习态度及课堂表现
            if (!empty($comment)) {
                echo "<h3>②学习态度及课堂表现：</h3>";
                echo "<p>{$comment}</p></br>";
            }
            
            // 默写情况
            if (!empty($dictationScores)) {
                echo "<h3>🌟默写情况：</h3>";
                echo "<pre>{$dictationScores}</pre></br>";
            }
            
            // 需要注意复习的单词
            if (!empty($wordsToReview)) {
                echo "<h3>🌟需要注意复习的单词：</h3>";
                echo "<pre>{$wordsToReview}</pre></br>";
            }
            
            // 今日作业
            if (!empty($homework)) {
                echo "<h3>③今日作业：</h3>";
                echo "<ol>";
                $tasks = explode("\n", $homework);
                foreach ($tasks as $task) {
                    echo "<li>{$task}</li>";
                }
                echo "</ol>";
            }
        }
    ?>
</body>
</html>
