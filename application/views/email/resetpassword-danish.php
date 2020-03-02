<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mammut email</title>
	</head>
	<body>

		<div bgcolor="#efefef" style="background-color: rgb(239, 239, 239); font-family: Arial,Arial,Arial,Tahoma,Helvetica,sans-serif; font-size: 16px;">
			<table style="background-color:#efefef" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">

				<tbody><tr>
					<td style="background-color:#efefef" width="1.5%">&nbsp;</td>
					<td style="background-color:#efefef" width="97%" bgcolor="#efefef" align="center">
						<table style="background-color:#efefef;font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;" width="97%" cellspacing="0" cellpadding="0" border="0">

							<tbody><tr>
								<td valign="top" align="center">
									<table width="640" cellspacing="0" cellpadding="0" border="0" align="center">

										<tbody><tr><td style="height:15px" valign="top"></td></tr></tbody></table>
								</td>
								</tr>
								<tr>
									<td valign="top" align="center">
										<table  style="background-color:#ffffff; font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;" width="640" cellspacing="0" cellpadding="0" border="0" align="center">

											<tbody><tr>
												<td valign="top">
													
												</td>
												</tr>

											</tbody>
										</table>
									</td>
								</tr>
								<tr>
									<td align="top" align="center">&nbsp;</td>
								</tr>

								<tr>
									<td  valign="top" align="center">
										<table  style="background-color:#ffffff; font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;" width="640" cellspacing="0" cellpadding="0" border="0" align="center">

											<tbody><tr>
												<td valign="top" height="30" align="center">&nbsp;</td>
												</tr>
												<tr>
													<td valign="top" align="center">
														<table style="background-color:#ffffff" width="550" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" align="center">

															<tbody><tr>
																<td valign="top" align="center">
																	<table width="100%" cellspacing="0" cellpadding="0" border="0" align="center">

																		<tbody><tr>
																			<td style="font-size:16px;line-height:22px;font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;font-weight:300;text-align:left;letter-spacing:-0.1px;" align="center">
																				<p>Kære  <strong><?php echo $username; ?></strong>,</p>
																			</td>
																			</tr>
																			<tr>
																				<td height="10">&nbsp;</td>
																			</tr>

																			<tr>
																				<td style="text-align:left;font-size:16px;color:#4c505d;line-height:20px" >
																					<p style=" font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;margin-top:0px;font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;">Du har sendt en anmodning om at nulstille adgangskoden. Brug venligst nedenstående kode for at nulstille adgangskoden.</p>

																				</td>
																			</tr>
																			<tr>
																				<td height="15">&nbsp;</td>
																			</tr>

																			<tr>
																				<td width="auto" valign="top" align="center">
																					<table width="200" cellspacing="0" cellpadding="0" border="0" align="center" style=" font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;">

																						<tbody><tr>
																						<?php if(isset($reset_code) && $reset_code!=''){?>
																							<td style="background-color:#4c85b1;border-radius:3px;background-clip:padding-box;font-size:18px;font-family:Arial,Tahoma,Helvetica,sans-serif;text-align:center;font-weight:bold;padding-left:5px;padding-right:5px;color:#fff" width="auto" valign="middle" height="50" align="center"><?php echo $reset_code;?></td>
																							<?php }else{?>
																							<td style="background-color:#4c85b1;border-radius:3px;background-clip:padding-box;font-size:18px;font-family:Arial,Tahoma,Helvetica,sans-serif;text-align:center;font-weight:bold;padding-left:5px;padding-right:5px;color:#fff" width="auto" valign="middle" height="50" align="center"><a href="<?php echo isset($login_link)?$login_link:''; ?>" style="text-decoration:none;color:#fff;letter-spacing:-0.25px;display:block;height:100%;line-height:48px;width:100%" target="_blank">Reset Password</a></td>
																							<?php }?>
																							</tr>

																						</tbody></table>
																				</td>
																			</tr>
																			<tr>
																				<td>Tak</td>
																			</tr>
																			<tr>
																				<td>The Mammut Team.</td>
																			</tr>

																		</tbody></table>
																</td>
																</tr>
																<tr>
																	<td height="40">&nbsp;</td>
																</tr>

															</tbody></table>
													</td>
												</tr>
												<tr>
													<td  style="background:#efefef" valign="top" height="15" align="center">&nbsp;</td>
												</tr>
												<tr>
													<td align="center">
														<table  style="background-color:#c3c3c3;  font-family:Arial,Tahoma,Helvetica,sans-serif;color:#4c505d;" width="640" cellspacing="0" cellpadding="0" border="0" align="center">

															<tbody><tr>
																<td align="center">
																	<table width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#efefef" align="center">

																		<tbody><tr>
																			<td align="center"><img alt="Mammut" src="<?php echo base_url();?>assets/images/logo_light.png" tabindex="0" width="300" border="0">
																			</td>
																			</tr>
																			<tr>
																				<td align="center">
																					<table width="110" cellspacing="0" cellpadding="0" border="0" align="center">

																						<tbody><tr>
																							<td style="border-top:0px solid #b7b7b7;margin:0;font-size:14px" width="110" align="center">&nbsp;</td>
																							</tr>

																						</tbody></table>
																				</td>
																			</tr>
																			<tr>
																				<td style="font-size:11px;line-height:18px;font-family:Arial,Tahoma,Helvetica,sans-serif;color:#8a8c93;font-weight:300;text-align:center" height="45">
																					&copy; 2018 All rights reserved. Mammut<br />
																					<!-- To edit your email preferences or unsubscribe, please <a href="">click here</a> --></td>
																			</tr>

																		</tbody></table>
																</td>
																</tr>

															</tbody></table>
													</td>
												</tr>

											</tbody></table>
									</td>
									<td style="background-color:#efefef" width="1.5%">&nbsp;</td>
								</tr>

							</tbody></table>
					</td>
					</tr>

				</tbody></table>
		</div>

	</body>
</html>