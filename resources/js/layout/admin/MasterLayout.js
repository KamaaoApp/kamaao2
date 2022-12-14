
import React from 'react';
import ReactDOM from 'react-dom';

export default function Login() {
    return (
        <div className='main'>
            	<div className="limiter">
		<div className="container-login100 page-background">
			<div className="wrap-login100">
				<form className="login100-form validate-form">
						
                        <img src="../../assets/img/taxi.png" alt="login image" />
					<span className="login100-form-logo">
					</span>
					<span className="login100-form-title p-b-34 p-t-27">
						Log in
					</span>
					<div className="wrap-input100 validate-input" data-validate="Enter username">
						<input className="input100" type="text" name="username" placeholder="Username" />
						<span className="focus-input100" data-placeholder="&#xf207;"></span>
					</div>
					<div className="wrap-input100 validate-input" data-validate="Enter password">
						
                    <input className="input100" type="password" name="pass" placeholder="Password" />
                    <span className="focus-input100" data-placeholder="&#xf191;">
						
                        </span>
					</div>
					<div className="contact100-form-checkbox">
                            <input className="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" />
                            <label className="label-checkbox100" htmlFor="ckb1">
						
							Remember me
						</label>
					</div>
					<div className="container-login100-form-btn">
						<button className="login100-form-btn">
							Login
						</button>
					</div>
					<div className="text-center p-t-50">
						<a className="txt1" href="forgot_password.html">
							Forgot Password?
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
        </div>
    );
}

if (document.getElementById('dashboard')) {
    ReactDOM.render(<Login />, document.getElementById('dashboard'));
}