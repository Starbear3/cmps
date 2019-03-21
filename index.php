!<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo wp_get_theme()->get('Name');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>

    <style>
        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 80vh;
            font-size: 1.3em;
        }

        h3 {
            text-transform: uppercase;
        }
    </style>
</head>
<body>

    <div class="content">

    <h3>CMP <?php echo wp_get_theme()->get('Name');?> Theme</h3>

    <p>Thanks for using CMP Theme but you are <strong>Doing it wrong!</strong></p>

    <p>You must use CMP Theme together with free CPM Plugin available on <a href="https://wordpress.org/plugins/cmp-coming-soon-maintenance/" target="_blank"></a> Wordpress Plugin website.</a></p>

    <p>After CMP Plugin activation go to CMP Settings > <a href="<?php echo admin_url(); ?>admin.php?page=cmp-upload-theme">Upload New Theme</a> and upload your zip file with CMP <?php echo wp_get_theme()->get('Name');?> Theme.</p>
    
    <p>Once your new CMP theme is installed, go to <a href="<?php echo admin_url(); ?>admin.php?page=cmp-settings">CMP Settings</a> to customize your new awesome CMP <?php echo wp_get_theme()->get('Name');?> Theme!</p>

    <p>Best regards, Alex & Paul from <a href="https://niteothemes.com">NiteoThemes</a></p>

    </div>

<?php wp_footer(); ?>
</body>
</html>