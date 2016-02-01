<?php include "skin/include/header.php" ?>
 
      <ul id="headlines">
 
<?php foreach ( $results['blogposts'] as $blog ) { ?>
 
        <li>
          <h2>
            <span class="pubDate"><?php echo date('j F', $blog->publicationDate)?></span><a href=".?action=viewArticle&amp;articleId=<?php echo $article->id?>"><?php echo htmlspecialchars( $article->title )?></a>
          </h2>
          <p class="summary"><?php echo htmlspecialchars( $blog->preview )?></p>
        </li>
 
<?php } ?>
 
      </ul>
 
      <p><a href="./?action=archive">Article Archive</a></p>
 
<?php include "skin/include/footer.php" ?>