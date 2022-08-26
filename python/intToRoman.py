class Solution:
    def intToRoman(self, num: int) -> str:

        if (num < 1) or (num > 3999):
            raise Exception('Wrong number')

        dct = {
            0:'',
            1:'I',
            2:'II',
            3:'III',
            4:'IV',
            5:'V',
            6:'VI',
            7:'VII',
            8:'VIII',
            9:'IX',
            10:'X',
            20:'XX',
            30:'XXX',
            40:'XL',
            50:'L',
            60:'LX',
            70:'LXX',
            80:'LXXX',
            90:'XC',
            100:'C',
            200:'CC',
            300:'CCC',
            400:'CD',
            500:'D',
            600:'DC',
            700:'DCC',
            800:'DCCC',
            900:'CM',
            1000:'M',
            2000:'MM',
            3000:'MMM',
        }

        tmp: int = num
        res = ''
        i = 0
        #print(tmp // 10)
        #print(tmp % 10)
        while tmp >= 1 :
            mod: int = tmp % 10
            res = str(dct[mod * (10**i)]) + res
            tmp = tmp // 10
            i = i + 1

        return res

if __name__=='__main__':
    sol = Solution()
    print(sol.intToRoman(10))