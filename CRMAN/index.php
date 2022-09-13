<?php
include('includes/config.php');

$page_title = "Home page";
$meta_description = "Home page description";
$meta_keywords = "Digital Transformation,
Strategic advice,
Fiber Optic Expertise and Engineering,
Technical expertise";

include('includes/header.php');
include('includes/navbar.php');
?>


<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-white">Category</h3>
                <div class="underline"></div>
            </div> 

            <?php
                $homeCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' LIMIT 12";
                $homeCategory_run = mysqli_query($con, $homeCategory);

                if(mysqli_num_rows($homeCategory_run) > 0)
                {
                    foreach($homeCategory_run as $homeCateItems)
                    {
                        ?>
                            <div class="col-md-3 mb-4">
                                <a class="text-decoration-none" href="category.php?title=<?= $homeCateItems['slug']; ?>">
                                    <div class="card card-body">
                                        <?= $homeCateItems['name']; ?>
                                    </div>
                                </a>
                            </div>
                            
                        <?php
                    }
                }
            ?>
        </div>
    </div>
</div>

<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">SFM Technology</h3>
                <div class="underline"></div>
                    <p>SFM is a company created in 1995, from the field of telecommunications and networks. Its team of high-level experts and engineers carries out engineering and consulting assignments on behalf of telecommunications regulators, operators, ICT Ministries and donors (WB, AfDB).</ p>
                    <p>It is during its missions that SFM has developed tools, applications and platforms for the digitalization of engineering processes, monitoring and measurement of QoS/QoE, tariff control, etc.</p>
                    <p>SFM has thus acquired expertise in the production of IT products for the telecom sector but also for other sectors such as insurance, banking and integrated management solutions for VSEs/SMEs.</ p>
                    <p>The tailor-made tools and developments offered by SFM are based on 3 axes:</p>
                    <ol>
                    <li><strong>Digitalization of business processes</strong> (or <em>Robotic Process Automation</em>) with the products COSAP, Ticketeazy and IT&amp;M</li>
                    <li><strong>Cybersecurity</strong> with a secure WiFi access portal, a SOC and an enterprise PKI</li>
                    <li><strong>Big Data and Artificial Intelligence</strong> with solutions for the telecommunications (fraud detection and churn), banking (exchange rate evolution estimation), adding layers of ML and DL in SFM products</li>
                    </ol>
                    <p>Some tools are immediately usable while others are customized by the SFM team after studying the needs and environment of each client.</p>
                    <p>SFM maintains a permanent link with all its customers, enabling it to develop its products, provide personalized after-sales service and on-site or remote assistance.</p>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3 class="text-dark">Lastest Posts</h3>
                <div class="underline"></div>

                <?php
                    $homePosts = "SELECT * FROM posts WHERE status='0' ORDER BY id DESC LIMIT 12";
                    $homePosts_run = mysqli_query($con, $homePosts);

                    if(mysqli_num_rows($homePosts_run) > 0)
                    {
                        foreach($homePosts_run as $homePostItems)
                        {
                            ?>
                                <div class="mb-4">
                                    <a class="text-decoration-none" href="post.php?title=<?= $homePostItems['slug']; ?>">
                                        <div class="card card-body bg-light">
                                            <?= $homePostItems['name']; ?>
                                        </div>
                                    </a>
                                </div>
                                
                            <?php
                        }
                    }
                ?>
            </div> 

            <div class="col md-3">
                <div class="card">
                    <div class="card-header">
                        <h4>Contact Us</h4>
                    </div>
                    <div class="card-body">
                        info@sfmtelecom.com
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>