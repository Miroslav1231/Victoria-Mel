<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sway</title>
  <?php wp_head(); ?>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>

  <header class="header">
    <div class="wrapper">
      <p class="header__logo">Victoria Mel</p>

      <div id="hamburger" class="hamburglar is-closed">
        <div class="burger-icon">
          <div class="burger-container">
            <span class="burger-bun-top"></span>
            <span class="burger-filling"></span>
            <span class="burger-bun-bot"></span>
          </div>
        </div>
      </div>

      <nav class="header__nav-menu">
        <ul class="nav-menu-list">
            
          <li class="nav-menu-list__item">
            <a href="#">portfolio</a>
          </li>

            <?php 
                $events = get_terms( 'event', [
                    'hide_empty' => true,
                    'parent' => 0
                ] );
                foreach ($events as $key => $event):
                    $eventLink = get_term_link( $event );
            ?>
          
            <li class="nav-menu-list__item">
                <a href="<?= $eventLink ?>"><?= $event -> name ?></a>
            </li>

            <?php endforeach; ?>
        </ul>
      </nav>
    </div>
  </header>
