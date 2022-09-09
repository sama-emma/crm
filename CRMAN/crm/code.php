<?php
include('authentication.php');


if(isset($_POST['post_update']))
{
    $post_id = $_POST['post_id'];

    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if($image != NULL)
    {
        // Rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time().'.'.$image_extension; 
        
        $update_filename = $filename;
    }
    else
    {
        $update_filename = $old_filename;
    }
    

    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE posts SET category_id = '$category_id', name='$name', slug='$slug', description='$description', image='$update_filename',
                meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword',
                status='$status' WHERE id='$post_id'";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        if($image != NULL){
            if(file_exists('../uploads/posts/'.$old_filename)){
                unlink("../uploads/posts/".$old_filename);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename);
        }
          
        $_SESSION['message'] = "Post Updated Successfully";
        header("Location: post-edit.php?id=".$post_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went wrong";
        header("Location: post-edit.php?id=".$post_id);
        exit(0);
    }
}


if(isset($_POST['post_add']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $image = $_FILES['image']['name'];
    // Rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_extension;

    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO posts (category_id,name,slug,description,image,meta_title,meta_description,meta_keyword,status) VALUES 
                ('$category_id', '$name','$slug','$description','$filename','$meta_title','$meta_description','$meta_keyword','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/'.$filename); 
        $_SESSION['message'] = "Post Created Successfully";
        header("Location: post-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went wrong";
        header("Location: post-add.php");
        exit(0);
    }
}


if(isset($_POST['category_delete']))
{
    $category_id = $_POST['category_delete'];

    $query = "UPDATE categories SET status='2' WHERE id='$category_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category deleted Successfully";
        header("Location: category-view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went wrong";
        header("Location: category-view.php");
        exit(0);
    }
}



if(isset($_POST['category_update']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', 
                meta_description='$meta_description', meta_keyword='$meta_keyword', navbar_status='$navbar_status', 
                status='$status' WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Update Successfully";
        header("Location: category-edit.php?id=".$category_id);
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went wrong";
        header("Location: category-edit.php?id=".$category_id);
        exit(0);
    }
}


if(isset($_POST['category_add']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];

    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $navbar_status = $_POST['navbar_status'] == true ? '1':'0';
    $status = $_POST['status'] == true ? '1':'0';

    $query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keyword,navbar_status,status) VALUES 
            ('$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$navbar_status','$status')";

    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Category Added Successfully";
        header("Location: category-add.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went wrong";
        header("Location: category-add.php");
        exit(0);
    }
}











if(isset($_POST['user_delete']))
{
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Error Occurred";
        header("Location: view-register.php");
        exit(0);
    }
}


if(isset($_POST['add_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0'; 

    $query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Added Successfully";
        header("Location: view-register.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Something Went Wrong!";
        header("Location: view-register.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1':'0';

    $query = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status'
                WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Update Successfully";
        header("Location: view-register.php");
        exit(0);
    }

}
?>