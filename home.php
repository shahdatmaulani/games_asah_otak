<?php
require_once 'get_master_kata.php';
$total_data = count($data);
$random_index = mt_rand(0, $total_data - 1);
$random_data = $data[$random_index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games Asah Otak</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Games Asah Otak</h2>
    <div class="container">
        <h3>Tebak Hewan Apa</h3>
        <h4>Pertanyaan</h4>
        <p><?php echo htmlspecialchars($random_data['clue']); ?></p>
        <h4>Jawab</h4>
        <div class="input-group">
            <?php
            $kata = $random_data['kata'];
            $kata_no_spaces = str_replace(' ', '', $kata);
            $length = strlen($kata_no_spaces);
            $visible_indexes = [];

            if ($length < 7) {
                $visible_indexes[] = 2;
            } elseif ($length >= 7) {
                $visible_indexes[] = 2;
                $visible_indexes[] = 6;
            }

            for ($i = 0, $j = 0; $i < strlen($kata); $i++) {
                if ($kata[$i] === ' ') {
                    echo '<span class="space"> </span>';
                } else {
                    if (in_array($j, $visible_indexes)) {
                        echo '<input type="text" maxlength="1" value="' . htmlspecialchars($kata_no_spaces[$j]) . '" readonly>';
                    } else {
                        echo '<input type="text" maxlength="1" name="jawaban[]" required>';
                    }
                    $j++;
                }
            }
            ?>
        </div>
        <br>
        <button onclick="checkAnswer()">Kirim Jawaban</button>
    </div>

    <div class="result" id="result"></div>

    <script>
        function checkAnswer() {
            const inputs = document.querySelectorAll('input[name="jawaban[]"]');
            let jawaban = '';
            let allFilled = true;
            let score = 0;

            inputs.forEach(input => {
                jawaban += input.value;
                if (input.value === '') {
                    allFilled = false;
                }
            });

            if (!allFilled) {
                alert('Harap isi semua kolom jawaban.');
                return;
            }

            const correctAnswer = "<?php echo $kata_no_spaces; ?>";
            console.log(`Correct Answer: ${correctAnswer}`);

            const visibleIndexes = [2];
            if (correctAnswer.length >= 7) {
                visibleIndexes.push(6);
            }

            for (let i = 0, inputIndex = 0; i < correctAnswer.length; i++) {
                if (visibleIndexes.includes(i)) {
                    console.log(`Skipping index: ${i}`);
                    continue;
                }
                const inputChar = inputs[inputIndex].value.toLowerCase();
                const correctChar = correctAnswer[i].toLowerCase();
                console.log(`Comparing input ${inputChar} with correct ${correctChar} at index ${i}`);
                if (inputChar === correctChar) {
                    score += 10;
                    console.log(`Correct at index ${i}: +10 (Total: ${score})`);
                } else {
                    if (inputChar !== '') {
                        score -= 2;
                        console.log(`Incorrect at index ${i}: -2 (Total: ${score})`);
                    }
                }
                inputIndex++;
            }

            const resultDiv = document.getElementById('result');
            resultDiv.innerHTML = `
                <p>Poin yang anda dapat adalah ${score}</p>
                <button onclick="saveScore(${score})">Simpan Poin</button>
                <button onclick="location.reload()">Ulangi</button>
            `;
        }

        function saveScore(score) {
            const name = prompt("Masukkan nama Anda:");
            if (name) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "save_score.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        alert("Data tersimpan!");
                        location.reload();
                    }
                };
                xhr.send(`name=${name}&score=${score}`);
            }
        }
    </script>
</body>
</html>
