<?php 
/*
    Template Name: Privacy Policy
*/

$site_name = get_bloginfo('name');
$site_url = site_url();

$phone_number = get_field('phone_number', 'option');
$address = get_field('business_address', 'option');

get_header();

?>

<section class="container">
    <div class="row">
        <div class="col-12">
            
            <h1>Privacy Policy</h1>
            <p><strong>Effective Date: 01-01-<?php echo date('Y'); ?></strong></p>
            
            <h2>Your privacy is important to us</h2>
            
            <?php if ($address != ''): ?> 
                <p><?php _e($site_name);?> is located at:</p>
                <address>
                    <?php _e($address); ?>
                </address>            
            <?php endif; ?>
            <?php if ($phone_number) echo "<p>". $phone_number . "</p>"; ?>
            
            <p>It is <?php _e($site_name);?>'s policy to respect your privacy regarding any information we may collect while operating our website. This Privacy Policy applies to <?php _e($site_url);?> (hereinafter, “us”, “we”, or “<?php _e($site_url);?>”). We respect your privacy and are committed to protecting personally identifiable information you may provide us through the Website. We have adopted this privacy policy (“Privacy Policy”) to explain what information may be collected on our Website, how we use this information, and under what circumstances we may disclose the information to third parties. This Privacy Policy applies only to information we collect through the Website and does not apply to our collection of information from other sources.</p>

            <p>This Privacy Policy, together with the Terms of service posted on our Website, set forth the general rules and policies governing your use of our Website. Depending on your activities when visiting our Website, you may be required to agree to additional terms of service.</p>
            
            <h2 id="websitevisitors">1. Website Visitors</h2>
            <p>Like most website operators, <?php _e($site_name);?> collects non-personally-identifying information of the sort that web browsers and servers typically make available, such as the browser type, language preference, referring site, and the date and time of each visitor request. <?php _e($site_name);?>’s purpose in collecting non-personally identifying information is to better understand how <?php _e($site_name);?>’s visitors use its website. From time to time, <?php _e($site_name);?> may release non-personally-identifying information in the aggregate, e.g., by publishing a report on trends in the usage of its website.</p>

            <p><?php _e($site_name);?> also collects potentially personally-identifying information like Internet Protocol (IP) addresses for logged in users and for users leaving comments on <?php _e($site_url);?> blog posts. <?php _e($site_name);?> only discloses logged in user and commenter IP addresses under the same circumstances that it uses and discloses personally-identifying information as described below.</p>
            
            <h2 id="PII">2. Personally-Identifying Information</h2>
            <p>Certain visitors to <?php _e($site_name);?>’s websites choose to interact with <?php _e($site_name);?> in ways that require <?php _e($site_name);?> to gather personally-identifying information. The amount and type of information that <?php _e($site_name);?> gathers depends on the nature of the interaction. For example, we ask visitors who contact us to provide their name, phone number, and email address.</p>
            
            <h2 id="Security">3. Security</h2>
            <p>The security of your Personal Information is important to us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While we strive to use commercially acceptable means to protect your Personal Information, we cannot guarantee its absolute security.</p>
            
            <h2 id="Remarketing">4. <?php _e($site_name);?> uses Google AdWords for remarketing</h2>
            <p><?php _e($site_name);?> uses the remarketing services to advertise on third party websites (including Google) to previous visitors to our site. It could mean that we advertise to previous visitors who haven’t completed a task on our site, for example using the contact form to make an enquiry. This could be in the form of an advertisement on the Google search results page, or a site in the Google Display Network. Third-party vendors, including Google, use cookies to serve ads based on someone’s past visits. Of course, any data collected will be used in accordance with our own privacy policy and Google’s privacy policy.</p>

            <p>You can set preferences for how Google advertises to you using the Google Ad Preferences page, and if you want to you can opt out of interest-based advertising entirely by cookie settings or permanently using a browser plugin.</p>
            
            <h2 id="Cookies">5. Cookies</h2>
            <p>To enrich and perfect your online experience, <?php _e($site_name);?> uses “Cookies”, similar technologies and services provided by others to display personalized content, appropriate advertising and store your preferences on your computer.</p>

            <p>A cookie is a string of information that a website stores on a visitor’s computer, and that the visitor’s browser provides to the website each time the visitor returns. <?php _e($site_name);?> uses cookies to help <?php _e($site_name);?> identify and track visitors, their usage of <?php _e($site_url);?>, and their website access preferences. <?php _e($site_name);?> visitors who do not wish to have cookies placed on their computers should set their browsers to refuse cookies before using <?php _e($site_name);?>’s websites, with the drawback that certain features of <?php _e($site_name);?>’s websites may not function properly without the aid of cookies.</p>

            <p>By continuing to navigate our website without changing your cookie settings, you hereby acknowledge and agree to <?php _e($site_name);?>’s use of cookies.</p>
            
            <h2 id="Changes">6. Privacy Policy Changes</h2>
            <p>Although most changes are likely to be minor, <?php _e($site_name);?> may change it's Privacy Policy from time to time, and in <?php _e($site_name);?>’s sole discretion. <?php _e($site_name);?> encourages visitors to frequently check this page for any changes to its Privacy Policy. Your continued use of this site after any change in this Privacy Policy will constitute your acceptance of such change.</p>
        </div>
    </div>
</section>


<?
get_footer();