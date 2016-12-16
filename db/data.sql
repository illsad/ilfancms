
--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `role_name`) VALUES
(1, 'Super Admin'),
(2, 'Admin');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_full_name`, `user_password`, `user_email`, `user_description`, `user_input_date`, `user_last_update`, `user_role_role_id`, `user_is_deleted`) VALUES
(1, 'admin', 'Admin', 'cfae66c98aa8d86383e07f1e1ea5d68e1cc6a613', 'admin@example.com', 'Admin default', '2015-07-30 04:32:54', '2015-07-30 04:32:54', 1, 0);

