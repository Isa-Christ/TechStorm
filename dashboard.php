<?php
require_once 'config.php';

// Vérifier si connecté
if(!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Récupérer les statistiques
$total_articles = $pdo->query("SELECT COUNT(*) FROM articles")->fetchColumn();
$total_users = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$total_categories = $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn();

// Récupérer les articles récents
$recent_articles = $pdo->query("
    SELECT a.*, u.username, u.full_name
    FROM articles a
    LEFT JOIN users u ON a.author_id = u.id
    ORDER BY a.created_at DESC
    LIMIT 5
")->fetchAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStorm - Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #0f172a;
            color: #e2e8f0;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #1e293b 0%, #0f172a 100%);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px 0;
            overflow-y: auto;
        }

        .logo {
            padding: 0 30px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo h1 {
            font-size: 28px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 900;
        }

        .menu {
            padding: 30px 0;
        }

        .menu-item {
            padding: 15px 30px;
            display: flex;
            align-items: center;
            gap: 15px;
            color: #94a3b8;
            text-decoration: none;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .menu-item:hover,
        .menu-item.active {
            background: rgba(102, 126, 234, 0.1);
            color: #667eea;
            border-left: 3px solid #667eea;
        }

        /* Main Content */
        .main-content {
            margin-left: 280px;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            padding: 20px 30px;
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .header h2 {
            font-size: 32px;
            font-weight: 700;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .username {
            font-size: 14px;
            color: #94a3b8;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            cursor: pointer;
        }

        .logout-btn {
            padding: 8px 16px;
            background: rgba(239, 68, 68, 0.2);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
            border-radius: 8px;
            text-decoration: none;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.3);
        }

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(15, 23, 42, 0.8) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
            border-color: rgba(102, 126, 234, 0.5);
        }

        .stat-value {
            font-size: 48px;
            font-weight: 800;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-label {
            color: #94a3b8;
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Articles Section */
        .content-section {
            background: rgba(30, 41, 59, 0.5);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
        }

        .section-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .section-header h3 {
            font-size: 24px;
            font-weight: 700;
        }

        .btn {
            padding: 12px 24px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.4);
        }

        .article-list {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .article-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background: rgba(15, 23, 42, 0.6);
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.3s ease;
        }

        .article-item:hover {
            background: rgba(15, 23, 42, 0.8);
            border-color: rgba(102, 126, 234, 0.3);
        }

        .article-info h4 {
            font-size: 18px;
            margin-bottom: 8px;
            color: white;
        }

        .article-meta {
            color: #64748b;
            font-size: 14px;
        }

        .article-status {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-published {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
        }

        .status-draft {
            background: rgba(234, 179, 8, 0.2);
            color: #eab308;
        }

        @media (max-width: 968px) {
            .sidebar {
                transform: translateX(-100%);
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo">
            <h1>TechStorm</h1>
        </div>
        <div class="menu">
            <a href="dashboard.php" class="menu-item active">📊 Dashboard</a>
            <a href="articles.php" class="menu-item">📝 Articles</a>
            <a href="categories.php" class="menu-item">🏷️ Catégories</a>
            <a href="users.php" class="menu-item">👥 Utilisateurs</a>
            <a href="settings.php" class="menu-item">⚙️ Paramètres</a>
        </div>
    </div>

    <div class="main-content">
        <div class="header">
            <h2>📊 Dashboard</h2>
            <div class="user-menu">
                <span class="username">Bonjour, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <div class="user-avatar"><?php echo strtoupper(substr($_SESSION['username'], 0, 1)); ?></div>
                <a href="logout.php" class="logout-btn">Déconnexion</a>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value"><?php echo $total_articles; ?></div>
                <div class="stat-label">Total Articles</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?php echo $total_users; ?></div>
                <div class="stat-label">Utilisateurs</div>
            </div>
            <div class="stat-card">
                <div class="stat-value"><?php echo $total_categories; ?></div>
                <div class="stat-label">Catégories</div>
            </div>
        </div>

        <div class="content-section">
            <div class="section-header">
                <h3>📝 Articles Récents</h3>
                <a href="article_new.php" class="btn">+ Nouvel Article</a>
            </div>
            <div class="article-list">
                <?php if(empty($recent_articles)): ?>
                    <p style="color: #64748b; text-align: center; padding: 20px;">Aucun article pour le moment</p>
                <?php else: ?>
                    <?php foreach($recent_articles as $article): ?>
                        <div class="article-item">
                            <div class="article-info">
                                <h4><?php echo htmlspecialchars($article['title']); ?></h4>
                                <div class="article-meta">
                                    Par <?php echo htmlspecialchars($article['username']); ?> • 
                                    <?php echo date('d/m/Y', strtotime($article['created_at'])); ?> • 
                                    <?php echo $article['views']; ?> vues
                                </div>
                            </div>
                            <span class="article-status status-<?php echo $article['status']; ?>">
                                <?php echo $article['status'] == 'published' ? 'Publié' : 'Brouillon'; ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
