var certificate = artifacts.require("./Certificate.sol");

module.exports = function(deployer) {
	// Demo is the contract's name
  deployer.deploy(certificate);
};
