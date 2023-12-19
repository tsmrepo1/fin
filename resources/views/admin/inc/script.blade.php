<script>
        function debounce(func, timeout = 400){
        let timer;
          return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => { func.apply(this, args); }, timeout);
          };
        }
        
        function getDetailsByIfsCode() {
            let ifsCode = document.getElementById("ifsc_code").value
            
            
            if(ifsCode == "NA") {
                document.getElementById("bank").value   = "NA"
                document.getElementById("branch").value = "NA"
                return
            }
            
            fetch(`https://ifsc.razorpay.com/${ifsCode}`)
            .then(response => {
                if(response.status == 200) 
                {
                    return response.json() 
                    
                }
                else {
                    document.getElementById("bank").value   = ""
                    document.getElementById("branch").value = ""
                }
            })
            .then(data => {
                document.getElementById("bank").value   = data.BANK
                document.getElementById("branch").value = data.BRANCH
            })
            .catch(error => {
                document.getElementById("bank").value   = ""
                document.getElementById("branch").value = ""
            })
        }
        
        function getDetails(){
            let pan = document.getElementById("pan").value;
            
            fetch(`{{ url('/vehicles/search') }}/${pan}`)
            .then(response => response.json())
            .then(data => {
              if(data.vehicle) {
                  document.getElementById("owners_name").value          = data.vehicle.owners_name
                  document.getElementById("contact_no").value           = data.vehicle.contact_no
                  document.getElementById("bank").value                 = data.vehicle.bank
                  document.getElementById("account_no").value           = data.vehicle.account_no
                  document.getElementById("branch").value               = data.vehicle.branch
                  document.getElementById("ifsc_code").value            = data.vehicle.ifsc_code
                  document.getElementById("fund_transfer_type").value   = data.vehicle.fund_transfer_type
              }
              else {
                  document.getElementById("owners_name").value          = ""
                  document.getElementById("contact_no").value           = ""
                  document.getElementById("bank").value                 = ""
                  document.getElementById("account_no").value           = ""
                  document.getElementById("branch").value               = ""
                  document.getElementById("ifsc_code").value            = ""
                  document.getElementById("fund_transfer_type").value   = ""
              }
            })
        }
        
        const ifsCodeChange = debounce(() => getDetailsByIfsCode());
        
        const panNumberChange = debounce(() => getDetails());
        
        
        $(document).ready(function() {
            $("#ifsc_code").on("keyup", function() {
                ifsCodeChange()
            })
            
            $("#pan").on("keyup", function() {
                panNumberChange()
            })
        })
</script>