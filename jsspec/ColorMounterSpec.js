describe("colorMounter",function(){
	var cM;

	beforeAll(function(){
		cM = new colorMounter();
	});

	it("validates labels is array",function(){
		var res = cM.isArrayOfLabels(12121);
		expect(res).toBe(false);

		var ris = cM.isArrayOfLabels(['ssd','fdgsdf']);
		expect(ris).toBe(true);
	});

});
