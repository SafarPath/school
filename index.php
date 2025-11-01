<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SafarPath - Schools Directory</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            color: white;
            margin-bottom: 40px;
            padding: 20px;
        }
        
        .header h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .schools-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .school-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            text-decoration: none;
            color: #333;
        }
        
        .school-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.3);
        }
        
        .school-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #667eea;
        }
        
        .school-name {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }
        
        .school-description {
            color: #666;
            line-height: 1.5;
        }
        
        .no-schools {
            text-align: center;
            color: white;
            font-size: 1.2rem;
            padding: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 10px;
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🏫 SafarPath Schools</h1>
            <p>Explore our network of educational institutions</p>
        </div>
        
        <div class="schools-grid">
            <?php
            // Get all directories (schools)
            $directories = array_filter(glob('*'), 'is_dir');
            
            // Remove hidden directories and the current directory
            $directories = array_filter($directories, function($dir) {
                return $dir != '.' && $dir != '..' && $dir[0] != '.';
            });
            
            if (count($directories) > 0) {
                foreach ($directories as $directory) {
                    $schoolName = ucfirst($directory);
                    $schoolUrl = $directory . '/';
                    
                    echo "
                    <a href='$schoolUrl' class='school-card'>
                        <div class='school-icon'>📚</div>
                        <div class='school-name'>$schoolName</div>
                        <div class='school-description'>Click to visit $schoolName School</div>
                    </a>
                    ";
                }
            } else {
                echo "
                <div class='no-schools'>
                    <h3>No schools found</h3>
                    <p>School directories will appear here once they are created.</p>
                </div>
                ";
            }
            ?>
        </div>
    </div>
</body>
</html>
