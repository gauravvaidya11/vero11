<!DOCTYPE html>
<html lang="en">
    <head>
        <?php $this->load->view("front/head"); ?>
    </head>
    <body>

        <?php $this->load->view("front/header"); ?>
        <section>
            <?php //$this->load->view("front/nav_menu"); ?>
            <?php $this->load->view($module . "/" . $view_file); ?>
        </section>
        <?php $this->load->view("front/footer"); ?>
        <?php // category_loop(0, false, false); ?>
    </body>
</html>
