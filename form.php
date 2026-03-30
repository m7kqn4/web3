<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Задание 3 - Анкета</title>
    <style>
    body {
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    background: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    margin: 0;
    padding: 20px;
    color: #1e293b;
    }

    .form-card {
    background: #ffffff;
    padding: 40px;
    border-radius: 28px;
    width: 100%;
    max-width: 400px;
    position: relative;
    box-shadow: 0 25px 40px -12px rgba(0, 0, 0, 0.15);
    }

    .form-card::before {
    content: '';
    position: absolute;
    inset: -8px;
    background: radial-gradient(circle at 30% 20%, rgba(60, 130, 222, 0.758));
    border-radius: 32px;
    z-index: -2;
    filter: blur(20px);
    }

    .form-card::after {
    content: '';
    position: absolute;
    inset: -4px;
    background: radial-gradient(circle at 70% 80%, rgba(59, 130, 246, 0.3), rgba(6, 182, 212, 0.15), transparent 65%);
    border-radius: 30px;
    z-index: -1;
    filter: blur(25px);
    }

    h2 {
    margin: 0 0 30px 0;
    font-size: 28px;
    font-weight: 700;
    background: linear-gradient(135deg, rgba(60, 130, 222, 0.758), #1372cbee);
    -webkit-background-clip: text;
    background-clip: text;
    color: #1b4ea0;
    text-align: center;
    letter-spacing: -0.5px;
    }   

    .field { margin-bottom: 24px; }

    label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    font-size: 14px;
    color: #1b4ea0;
    }

    input[type="text"], 
    input[type="tel"], 
    input[type="email"], 
    input[type="date"], 
    select, 
    textarea {
    width: 100%;
    padding: 12px 16px;
    border: 1.5px solid #e2e8f0;
    border-radius: 14px;
    background: #ffffff;
    font-size: 15px;
    transition: all 0.3s ease;
    color: #1e293b;
    box-sizing: border-box;
    }

    input:focus, 
    select:focus, 
    textarea:focus {
    outline: none;
    border-color: #1b4ea0;;
    box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
    }

    .options-group {
    display: flex;
    gap: 25px;
    margin-top: 8px;
    }

    .options-group label, 
    .checkbox-field label {
    font-weight: 500;
    font-size: 14px;
    color: #334155;
    display: flex;
    align-items: center;
    gap: 8px;
    cursor: pointer;
    }

    input[type="radio"], 
    input[type="checkbox"] {
        accent-color: #3b82f6;
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    select[multiple] {
    border: 1.5px solid #e2e8f0;
    padding: 10px;
    margin-top: 5px;
    border-radius: 14px;
    min-height: 130px;
    }

    select[multiple] option {
    padding: 8px 10px;
    border-radius: 8px;
    margin: 2px 0;
    }

    select[multiple] option:checked {
    background: linear-gradient(135deg, #3b82f6, #06b6d4);
    color: white;
    }

    button {
    background: linear-gradient(135deg, #2059b4, #066dd4);
    color: white;
    border: none;
    padding: 14px 20px;
    width: 100%;
    font-size: 16px;
    font-weight: 600;
    border-radius: 40px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 10px;
    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.25);
    }

    button:hover {
    background: linear-gradient(135deg, #2563eb, #0891b2);
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.35);
    }

    button:active {
    transform: translateY(0);
    }

    small {
    display: block;
    margin-top: 8px;
    color: #6c8fb0;
    font-size: 12px;
    }

    textarea {
    min-height: 80px;
    resize: vertical;
    font-family: inherit;
    }
    </style>
</head>
<body>

    <div class="form-card">
        <h2>Регистрация</h2>
        
        <form action="index.php" method="POST">
            <div class="field">
                <label>ФИО</label>
                <input type="text" name="name" placeholder="Иван Иванович Иванов" required>
            </div>

            <div class="field">
                <label>Телефон</label>
                <input type="tel" name="phone" placeholder="+7 900 000 00 00" required>
            </div>

            <div class="field">
                <label>E-mail</label>
                <input type="email" name="email" placeholder="example@mail.com" required>
            </div>

            <div class="field">
                <label>Дата рождения</label>
                <input type="date" name="birthday" required>
            </div>

            <div class="field">
                <label>Пол</label>
                <div class="options-group">
                    <label><input type="radio" name="gender" value="male" checked> Мужской</label>
                    <label><input type="radio" name="gender" value="female"> Женский</label>
                </div>
            </div>

            <div class="field">
                <label>Любимый язык программирования</label>
                <select name="languages[]" multiple required>
                    <option value="1">Pascal</option>
                    <option value="2">C</option>
                    <option value="3">C++</option>
                    <option value="4">JavaScript</option>
                    <option value="5">PHP</option>
                    <option value="6">Python</option>
                    <option value="7">Java</option>
                    <option value="8">Haskel</option>
                    <option value="9">Clojure</option>
                    <option value="10">Prolog</option>
                    <option value="11">Scala</option>
                    <option value="12">Go</option>
                </select>
                <small>Зажмите Ctrl (Cmd) для выбора нескольких</small>
            </div>

            <div class="field">
                <label>Биография</label>
                <textarea name="bio" placeholder="Кратко о себе..."></textarea>
            </div>

            <div class="field checkbox-field">
                <label>
                    <input type="checkbox" name="contract" value="y" required>
                    С контрактом ознакомлен(а)
                </label>
            </div>

            <button type="submit">Сохранить</button>
        </form>
    </div>

</body>
</html>
