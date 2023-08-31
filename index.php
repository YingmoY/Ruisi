<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>学习报告生成器</title>
</head>

<body>
    <h2>学习报告生成器 v2.0</h2>
    
    <form method="post" action="result.php">
        <label for="date">日期：</label>
        <input type="date" id="date" name="date" required><br><br>
        
        
        <label for="studentName">学生姓名：</label>
        <input type="text" id="studentName" name="studentName" required><br><br>
        

        <label>学习内容：</label><br>
        <input type="checkbox" id="newLearningCheckbox" name="newLearningCheckbox" onchange="toggleNewLearningFields()">
        <label for="newLearningCheckbox">新学</label>
        <label>: Unit</label>
        <input type="text" id="newLearningStartUnit" name="newLearningStartUnit" placeholder="开始单元" size="4">
        <label> ~ Unit</label>
        <input type="text" id="newLearningEndUnit" name="newLearningEndUnit" placeholder="结束单元" size="4"><br>
        <input type="checkbox" id="reviewCheckbox" name="reviewCheckbox" onchange="toggleReviewField()">
        <label for="reviewCheckbox">其它</label>
        <input type="text" id="reviewContent" name="reviewContent" placeholder="如复习内容或其它学习内容"><br>
        <button type="button" onclick="completeLearningFields()">完成</button>
        <label> （填写完成学习内容后请点击完成）</label><br><br>   
        
        
        <label>学习时间：</label>
        <input type="time" id="studyStartTime" name="studyStartTime" step="1800" min="00:00" max="23:30" onchange="setEndTime()" required>
        <label> ~ </label>
        <input type="time" id="studyEndTime" name="studyEndTime" step="1800" min="00:00" max="23:30" required><br><br>
        
        <label for="vocabularyCount">学习/复习词汇量：</label>
        <input type="text" id="vocabularyCount" name="vocabularyCount" required><br><br>
        
        <label for="dictationAccuracy">默写正确率：</label>
        <input type="text" id="dictationAccuracy" name="dictationAccuracy" placeholder="没有则留空；%会自动生成"><br><br>
        
        <label for="softwareAccuracy">软件正确率：</label>
        <input type="text" id="softwareAccuracy" name="softwareAccuracy" placeholder="没有则留空；%会自动生成"><br><br>
        
        <label for="comment">学习态度及课堂表现：</label><br>

        <label>常用标点： </label>
        <button type="button" onclick="addSentence(',')">逗号</button>
        <button type="button" onclick="addSentence('。')">句号</button>
        <button type="button" onclick="addSentence('()')">括号</button>
        <button type="button" onclick="addSentence('！')">感叹号</button>
        <button type="button" onclick="addSentence('~')">波浪号</button>
        </br>

        <label>常用短语：</label>
        <button type="button" onclick="addSentence('，值得表扬！')">，值得表扬！</button>
        <button type="button" onclick="addSentence('，提出注意~')">，提出注意~</button>
        <button type="button" onclick="addSentence('，继续加油！')">，继续加油！</button>
        </br>

        <label>常用评价： (xx为自动获取的学生姓名结尾两个字)</label></br>
        <label>今天 xx 总体表现</label>
        <select id="gradeOption">
            <option value="很好">很好</option>
            <option value="较好">较好</option>
            <option value="还可以">还可以</option>
            <option value="一般">一般</option>
            <option value="不是很理想">不是很理想</option>
            <option value="欠佳">欠佳</option>
        </select>
        <button type="button" onclick="addSentence('今天'); addSentence(getName()); addSentence('总体表现'); addSentence(document.getElementById('gradeOption').value)">添加</button>
        <button type="button" onclick="addSentence(',')">逗号</button>
        <button type="button" onclick="addSentence('。')">句号</button><br>

        <select id="arrivalOption">
            <option value="提前">提前</option>
            <option value="按时">按时</option>
            <option value="稍晚">稍晚</option>
            <option value="较晚">较晚</option>
        </select>
        <label>到达教室</label>
        <button type="button" onclick="addSentence(document.getElementById('arrivalOption').value); addSentence('到达教室')">添加</button>
        <button type="button" onclick="addSentence(',')">逗号</button>
        <button type="button" onclick="addSentence('。')">句号</button><br>

        <select id="timeOption">
            <option value="可以">可以</option>
            <option value="不能">不能</option>
        </select>
        <label>很快进入学习状态</label>
        <button type="button" onclick="addSentence(document.getElementById('timeOption').value); addSentence('很快进入学习状态')">添加</button>
        <button type="button" onclick="addSentence(',')">逗号</button>
        <button type="button" onclick="addSentence('。')">句号</button><br>

        <select id="studyOption">
            <option value="可以">可以</option>
            <option value="能够基本">能够基本</option>
            <option value="不能">不能</option>
        </select>
        <label>跟紧老师步伐</label>
        <button type="button" onclick="addSentence(document.getElementById('studyOption').value); addSentence('跟紧老师步伐')">添加</button>
        <button type="button" onclick="addSentence(',')">逗号</button>
        <button type="button" onclick="addSentence('。')">句号</button><br>

        <label>单词背诵速度</label>
        <select id="speedOption">
            <option value="较快">较快</option>
            <option value="一般">一般</option>
            <option value="较慢">较慢</option>
        </select>
        <button type="button" onclick="addSentence('单词背诵速度'); addSentence(document.getElementById('speedOption').value)">添加</button>
        <button type="button" onclick="addSentence(',')">逗号</button>
        <button type="button" onclick="addSentence('。')">句号</button><br>

        <label>xx 同学今天课前没有完成pad的复习任务，占用了课上时间复习，希望课后加强复习哦！</label>
        <button type="button" onclick="addSentence(getName()); addSentence('同学今天课前没有完成pad的复习任务，占用了课上时间复习，希望课后加强复习哦！')">添加</button><br>

        <label>注意到 xx 同学今天上课精神比较疲惫，经常打哈欠，要注意劳逸结合~</label>
        <button type="button" onclick="addSentence('注意到'); addSentence(getName()); addSentence('同学今天上课精神比较疲惫，经常打哈欠，要注意劳逸结合~')">添加</button><br>

        <label>虽然不熟悉的词较多，但是 xx 和老师一起克服困难，坚持学习。</label>
        <button type="button" onclick="addSentence('虽然不熟悉的词较多，但是'); addSentence(getName()); addSentence('和老师一起克服困难，坚持学习。')">添加</button><br>

        <label>同时我们发现 xx 在形近/发音接近词的辨析上存在困难，课下要重点加强这方面单词的复习。</label>
        <button type="button" onclick="addSentence('同时我们发现'); addSentence(getName()); addSentence('在形近/发音接近词的辨析上存在困难，课下要重点加强这方面单词的复习。')">添加</button><br>

        <label>我们发现一些反复复习的单词 xx 还是不能熟练记忆，课下一定要加强复习。</label>
        <button type="button" onclick="addSentence('我们发现一些反复复习的单词'); addSentence(getName()); addSentence('还是不能熟练记忆，课下一定要加强复习。')">添加</button><br>

        <label>xx 加油！</label>
        <button type="button" onclick="addSentence(getName()); addSentence('加油！')">添加</button><br>


        <br>
        <textarea id="comment" name="comment" rows="6" cols="50" required></textarea><br><br>
        
        <label for="dictationScores">默写情况(没有则留空)：</label><br>
        <textarea id="dictationScores" name="dictationScores" rows="4" cols="50"></textarea><br><br>
        
        <label for="wordsToReview">需要注意复习的单词(没有则留空)：</label><br>
        <textarea id="wordsToReview" name="wordsToReview" rows="2" cols="50">no信封中的单词</textarea><br><br>
        
        <label for="homework">今日作业：</label><br>
        <textarea id="homework" name="homework" rows="2" cols="50" required>
1.完成pad推送的任务
2.复习no信封中的单词</textarea><br><br>
        
        <input type="submit" value="生成报告">
    </form>
    
    <script>
        
        newLearningStartUnit.disabled = true;
        newLearningEndUnit.disabled = true;
        reviewContent.disabled = true;

        function toggleNewLearningFields() {
            var newLearningCheckbox = document.getElementById("newLearningCheckbox");
            var newLearningStartUnit = document.getElementById("newLearningStartUnit");
            var newLearningEndUnit = document.getElementById("newLearningEndUnit");
            newLearningStartUnit.disabled = !newLearningCheckbox.checked;
            newLearningEndUnit.disabled = !newLearningCheckbox.checked;
        }

        function toggleReviewField() {
            var reviewCheckbox = document.getElementById("reviewCheckbox");
            var reviewContent = document.getElementById("reviewContent");
            reviewContent.disabled = !reviewCheckbox.checked;
        }

        function completeLearningFields() {
            var newLearningCheckbox = document.getElementById("newLearningCheckbox");
            var reviewCheckbox = document.getElementById("reviewCheckbox");
            var newLearningStartUnit = document.getElementById("newLearningStartUnit");
            var newLearningEndUnit = document.getElementById("newLearningEndUnit");
            var dictationScores = document.getElementById("dictationScores");
            var vocabularyCount = document.getElementById("vocabularyCount");

            if (newLearningCheckbox.checked) {
                // 预填充“默写情况”
                var startUnit = newLearningStartUnit.value;
                var endUnit = newLearningEndUnit.value;

                if (startUnit && endUnit) {
                    var defaultText = "";
                    for (var unit = parseInt(startUnit); unit <= parseInt(endUnit); unit++) {
                        defaultText += "Unit" + unit + ": /28 \n";
                    }
                    dictationScores.value = defaultText;
                }

                // 预填充“学习/复习词汇量”
                if (startUnit && endUnit) {
                    if (reviewCheckbox.checked) {
                        vocabularyCount.value = (endUnit - startUnit + 1) * 28 + "+";
                    } else {
                        vocabularyCount.value = (endUnit - startUnit + 1) * 28;
                    }
                }
            }
        }
        
        function setEndTime() {
            var startTimeInput = document.getElementById("studyStartTime");
            var endTimeInput = document.getElementById("studyEndTime");

            var startTime = startTimeInput.value;
            if (startTime) {
                var parts = startTime.split(":");
                var hours = parseInt(parts[0]);
                var minutes = parseInt(parts[1]);
                var endTime = new Date();
                endTime.setHours(hours + 3, minutes);
                var endTimeString = endTime.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
                endTimeInput.value = endTimeString;
            }
        }

        
        // 自动输入预设的评价
        function addSentence(sentence) {
            var commentTextarea = document.getElementById("comment");
            commentTextarea.value += sentence;
        }

        // 获取学生姓名后两个字
        function getName() {
            var str = document.getElementById("studentName").value;
            return str.slice(-2);
        }
    </script>
</body>
</html>
