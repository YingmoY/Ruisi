<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学习报告生成器 - 报告结果</title>
</head>
<body>
    <!-- 一键复制按钮 -->
    <button onclick="copyToClipboard()">一键复制</button><br>

    <?php
        // 检查表单是否已提交
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // 获取表单数据
            $date = $_POST["date"];
            $studentName = $_POST["studentName"];
            $studyStartTime = $_POST["studyStartTime"];
            $studyEndTime = $_POST["studyEndTime"];
            $vocabularyCount = $_POST["vocabularyCount"];
            $dictationAccuracy = $_POST["dictationAccuracy"];
            $softwareAccuracy = $_POST["softwareAccuracy"];
            $comment = $_POST["comment"];
            $dictationScores = $_POST["dictationScores"];
            $wordsToReview = $_POST["wordsToReview"];
            $homework = $_POST["homework"];

            // 构建学习报告内容
            $report = "";
            $report .= "{$date} Report \n";
            $report .= "《单词速记素质能力课程》\n\n";
            
            // 构建学习速记学习情况及反馈
            $report .= "① 单词速记学习情况及反馈：\n";
            $report .= "🎓学生: {$studentName}\n";
            $report .= "⏰ 学习时间：{$studyStartTime} ~ {$studyEndTime}\n";

            // 处理新学行
            $newLearningCheckbox = isset($_POST["newLearningCheckbox"]);
            $overallStudyContent = '';
            if ($newLearningCheckbox) {
                $newLearningStartUnit = $_POST["newLearningStartUnit"];
                $newLearningEndUnit = $_POST["newLearningEndUnit"];
                $overallStudyContent = 'Unit'.$newLearningStartUnit.'~Unit'.$newLearningEndUnit;
            }
            // 处理复习行
            $reviewCheckbox = isset($_POST["reviewCheckbox"]);
            if ($reviewCheckbox && !empty($_POST["reviewContent"])) {
                $reviewContent = $_POST["reviewContent"];
                if ($newLearningCheckbox) {
                    $overallStudyContent .= ' + '.$reviewContent;
                } else {
                    $overallStudyContent = $reviewContent;
                }
            }
            // 输出今日学习/复习内容
            $report .= "📍 今日学习/复习内容：{$overallStudyContent}\n";

            // 学习词汇量
            $report .= "📖 学习/复习词汇量：{$vocabularyCount}\n";
            
            // 默写正确率
            if (!empty($dictationAccuracy)) {
                $report .= "📈 默写正确率：{$dictationAccuracy}% \n";
            }

            // 软件正确率
            if (!empty($softwareAccuracy)) {
                $report .= "🏷 软件正确率：{$softwareAccuracy}% \n";
            }

            // 学习态度及课堂表现
            if (!empty($comment)) {
                $report .= "\n② 学习态度及课堂表现：\n {$comment}\n";
            }
            
            // 默写情况
            if (!empty($dictationScores)) {
                $report .= "\n🌟 默写情况：\n";
                $report .= "{$dictationScores}\n";
            }
            
            // 需要注意复习的单词
            if (!empty($wordsToReview)) {
                $report .= "\n🌟 需要注意复习的单词：\n";
                $report .= "{$wordsToReview}\n";
            }
            
            // 今日作业
            if (!empty($homework)) {
                $report .= "\n③ 今日作业：\n";
                $tasks = explode("\n", $homework);
                foreach ($tasks as $task) {
                    $report .= "{$task}\n";
                }
            }

            // 输出学习报告内容到一个可编辑的大输入框
            echo '<textarea rows="50" cols="80">' . htmlspecialchars($report) . '</textarea>';
        }
    ?>

    <!-- 一键复制按钮 -->
    <br><button onclick="copyToClipboard()">一键复制</button>

    <!-- JavaScript 代码，用于复制内容到剪贴板 -->
    <script>
        function copyToClipboard() {
            var textarea = document.querySelector('textarea');
            textarea.select();
            document.execCommand('copy');
            alert('报告内容已复制到剪贴板');
        }
    </script>
</body>
</html>
