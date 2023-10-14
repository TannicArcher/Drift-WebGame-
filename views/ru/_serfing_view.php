<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Просмотр сайтов</title>
    <meta name="robots" content="none"/>

</head>
<frameset onLoad="javascript: frame_footer.startClock();" rows="*,120" style="border: none;">
    <frame name="frame_site" src="<?=$serf_data['url']; ?>" marginwidth="0" marginheight="0" frameborder="0"/>
    <frame name="frame_footer" src="<?=$url; ?>" marginwidth="0" marginheight="0" scrolling="no" noresize="noresize" frameborder="0"/>
</frameset>
</html>