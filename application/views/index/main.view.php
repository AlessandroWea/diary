<div class="wrapper">
	<div class="bar">
		<div class="bar_avatar">
			<img width="300px" src="https://cdn.pixabay.com/photo/2014/03/29/09/17/cat-300572_1280.jpg" alt="Avatar">
			<p>Name: <?=$_SESSION['user_name'];?></p>
		</div>

		<div class="bar_actions">
			<a href="<?=SERVER_PATH . 'write'?>">
				<div class="bar_action">
					<img class="bar_action_icon" width="20px" src="./public/assets/copy-writing.png" alt="icon"><p>Write today's diary</p>
				</div>		
			</a>
			<a href="#">
				<div class="bar_action">
					<i></i><p>Something else</p>
				</div>				
			</a>
			<a href="<?=SERVER_PATH . 'logout';?>">
				<div class="bar_action">
					<img class="bar_action_icon" width="20px" src="./public/assets/close.png" alt="icon"><p>Exit the account</p>
				</div>	
			</a>

		</div>
	</div>
	<div class="content">
		<div class="content_list">
			<?php foreach($writings as $writing): ?>
				<div class="content_item">
					<a href="<?=SERVER_PATH . 'view/' . $writing['id']?>">
						<span class="content_item_date"><?=$writing['date_of_creation']?></span>
						<span class="content_item_preview"><?=$writing['preview']?></span>	
					</a>
				</div>
			<?php endforeach;?>
		</div>
	</div>
</div>