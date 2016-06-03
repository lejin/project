/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  lejin
 * Created: Jun 3, 2016
 */

ALTER TABLE `tbl_user_program`
	DROP FOREIGN KEY `FK_tbl_user_program_tbl_user`,
	DROP FOREIGN KEY `FK_tbl_user_program_tbl_programs`;
ALTER TABLE `tbl_user_course`
	DROP FOREIGN KEY `tbl_user_course_ibfk_2`,
	DROP FOREIGN KEY `tbl_user_course_ibfk_1`;