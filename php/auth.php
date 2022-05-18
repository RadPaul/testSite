<label for="login">Login:</label> 
<input type="text" name="login" id="login" value="" placeholder="only letters and numbers" pattern="[a-zA-Z0-9]{4,20}" required autofocus>
<label for="password">Password:</label>
<input type="password" name="password" id="password" value="" placeholder="password" pattern="[a-zA-Z0-9]{4,20}" required>
<input type="button" name="submit" id="submit" value="ok" onclick="authentification()">