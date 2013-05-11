<html>
	<title>TightVNC</title>
	<body>
		<applet archive="tightvnc-jviewer.jar" code="com.glavsoft.viewer.Viewer" width="1024" height="768">
			<param name="Host" value="<? echo($_GET['host']); ?>" /> <!-- Host to connect. Default:  the host from which the applet was loaded. -->
			<param name="Port" value="<? echo($_GET['display'] + 5900); ?>" /> <!-- Port number to connect. Default: 5900 -->
			<param name="Password" value="<? echo($_GET['pass']); ?>" /> <!-- Password to the server (not recommended to use this parameter here) -->
			<param name="OpenNewWindow" value="no" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="ShowControls" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="ViewOnly" value="no" /> <!-- yes/true or no/false. Default: no/false -->

			<param name="ShareDesktop" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="AllowCopyRect" value="yes" /> <!-- yes/true or no/false. Default: yes/true -->
			<param name="Encoding" value="Tight" /> <!-- Possible values: "Tight", "Hextile", "ZRLE", and "Raw". Default: Tight -->
			<param name="CompressionLevel" value="" /> <!-- 1-9 or empty. Empty means some default -->
			<param name="JpegImageQuality" value="" /> <!-- 1-9 or empty. When empty no jpeg compression used -->
			<param name="LocalPointer" value="yes" /> <!-- Possible values: on/yes/true (draw pointer locally), off/no/false (let server draw pointer), hide). Default: "On"-->

			<param name="colorDepth" value="" /> <!-- Reserved for future. Possible values: 6, 8, 16, 24, 32 (equals to 24). Only 24/32 is supported now -->
			<param name="ScalingFactor" value="100" /> <!-- Reserved for future. Always 100% now -->
		</applet>
	</body>
</html>
